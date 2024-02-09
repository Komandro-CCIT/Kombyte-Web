const $fileInput = $('.file-input');
const $droparea = $('.file-drop-area');
const $delete = $('.item-delete');

$fileInput.on('dragenter focus click', function () {
  $droparea.addClass('is-active');
});

$fileInput.on('dragleave blur drop', function () {
  $droparea.removeClass('is-active');
});

$fileInput.on('change', function () {
  let filesCount = $(this)[0].files.length;
  let $textContainer = $(this).prev();

  if (filesCount === 1) {
    let fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
    $('.item-delete').css('display', 'inline-block');
    $('.submit').css('display', 'flex');
  } else if (filesCount === 0) {
    $textContainer.text('or drop files here');
    $('.item-delete').css('display', 'none');
    $('.submit').css('display', 'none');
  } else {
    $textContainer.text(filesCount + ' files selected');
    $('.item-delete').css('display', 'inline-block');
    $('.submit').css('display', 'flex');
  }
});

$delete.on('click', function () {
  $('.file-input').val(null);
  $('.file-msg').text('or drop files here');
  $('.item-delete').css('display', 'none');
  $('.submit').css('display', 'none');
});

// Wait for the page to load
document.addEventListener("DOMContentLoaded", function() {

  // Get the elements with the respective IDs
  var submisiContainer = document.getElementById("submisi");
  var startContainer = document.getElementById("start");
  var timerContainer = document.getElementById("timerduh");

  // Hide the submisi container initially
  submisiContainer.classList.add("hide");
  timerContainer.classList.add("hide");

  // Show the start container initially
  startContainer.classList.remove("hide");

  // Add click event listener to the start button
  var startButton = document.querySelector("#start button");
  startButton.addEventListener("click", function() {
    // Hide the start container
    startContainer.classList.add("hide");

    // Show the submisi container
    submisiContainer.classList.remove("hide");
    timerContainer.classList.remove("hide");
  });
});

