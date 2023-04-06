var input = document.querySelector('#image_film');
var preview = document.querySelector('.preview');
var cross = document.querySelector('#cross');
input.addEventListener('change', () => updateImageDisplay());
var curFiles = '../img/avatar/user_avatar.png';
var list = document.createElement('ol');
preview.appendChild(list);
var listItem = document.createElement('li');
var image = document.createElement('img');
listItem.appendChild(image);
list.appendChild(listItem);

function updateImageDisplay() {
    while(preview.firstChild) {
      preview.removeChild(preview.firstChild);
    }
    var curFiles = input.files;
    if(curFiles.length === 0) {
      preview.appendChild(para);
    } else {
      var list = document.createElement('ol');
      preview.appendChild(list);
      for(var i = 0; i < curFiles.length; i++) {
        var listItem = document.createElement('li');
        if(validFileType(curFiles[i])) {
          var image = document.createElement('img');
          image.src = window.URL.createObjectURL(curFiles[i]);
          listItem.appendChild(image);
        }
        list.appendChild(listItem);
        cross.classList.add("hidden");
        preview.classList.remove("blur-sm")
      }
    }
  }

  var fileTypes = [
    'image/jpeg',
    'image/jpg',
    'image/png',
    'image/webp'
  ]

  function validFileType(file) {
    for(var i = 0; i < fileTypes.length; i++) {
      if(file.type === fileTypes[i]) {
        return true;
      }
    }

    return false;
  }
  function returnFileSize(number) {
    if(number < 1024) {
      return number + ' octets';
    } else if(number >= 1024 && number < 1048576) {
      return (number/1024).toFixed(1) + ' Ko';
    } else if(number >= 1048576) {
      return (number/1048576).toFixed(1) + ' Mo';
    }
  }