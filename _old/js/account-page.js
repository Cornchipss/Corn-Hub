/*
 * REQUIRES:
 *   login-reigister.js
 * SUMMARY:
 *   Handles the different views of the account page and the forms
 */

function openSection(event, sectionName)
{
  $('.tabbed-item').css('display', 'none');

  $('.tab-link').removeClass('active');

  $(`#${sectionName}`).css('display', 'block');
  $(event).addClass('active');
}

$(() =>
{
  $('#login-form').submit(async (e) =>
  {
    e.preventDefault();
    let emailInput = $('#email').val();
    let passwordInput = $('#password').val();

    await login(emailInput, passwordInput);

    $('#password').val('');
    console.log(getUser());
  });

  $('#register-form').submit(async (e) =>
  {
    e.preventDefault();
    let emailInput = $('#reg-email').val();
    let username = $('#reg-username').val().trim();
    let passwordInput = $('#reg-password').val();

    console.log($('#password-confirm').val());
    console.log(passwordInput);
    if($('#password-confirm').val() !== passwordInput)
    {
      alert('Passwords don\'t match!');
      return;
    }

    let res = validateUsername(username);

    if(res !== null)
    {
      alert(res);
    }
    else
    {
      register(emailInput, passwordInput).then(() =>
      {
        getUser().updateProfile({
          displayName: username
        }).then(function()
        {
          alert('Account Creation Successful!');
        }).catch(function(err)
        {
          console.log(err);
          alert(err);
        });
      }).catch((err) =>
      {
        alert(err);
      });
    }

    $('#password').val('');
    console.log(getUser());
  });
});

function validateUsername(un)
{
    let error;
    let illegalChars = /\W/; // allow letters, numbers, and underscores

    if (un == "")
      error = "You didn't enter a username.\n";
    else if ((un.length < 5) || (un.length > 15))
      error = "The username must have a length of more than 5 and less than 15.\n";
    else if (illegalChars.test(un.value))
      error = "The username contains illegal characters.\n";
    else
      return null; // Null means no error
    return error;
}

function register(email, pword)
{
  return new Promise((resolve, reject) =>
  {
    firebase.auth().createUserWithEmailAndPassword(email, pword).then(() =>
    {
      login(email, pword);
      resolve('Success');
    }).catch((error) =>
    {
      reject(error);
    });
  })
}

async function login(email, pword)
{
  await firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL).then(() =>
  {
    firebase.auth().signInWithEmailAndPassword(email, pword).then(() =>
    {
      openSection('#account-info-btn', 'account-info');
    }).catch((error) =>
    {
      handleError(error);
    });
  }).catch((error) =>
  {
    console.log(error);
  });
}

function handleError(err)
{
  switch(err.code)
  {
    case 'auth/invalid-email':
      alert('Invalid email address.');
      break;
    case 'auth/wrong-password':
      alert('Incorrect username or password.');
      break;
    case 'auth/weak-password':
      alert('That is too weak a password.');
      break;
    case 'auth/user-not-found':
      alert('Unknown user.');
      break;
    default:
      alert(err.code);
  }
  console.log(err);
}
