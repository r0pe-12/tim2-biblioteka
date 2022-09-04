// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//open and close hamburger menu
const unameRegEx = '^(?=[a-zA-Z0-9_-]{3,254}$)(?!.*[_-]{2})[^_-].*[^_-]$';
  var hamburger = $('#hamburger');
  var sidebar = $('.sidebar');

  sidebar.on('mouseenter', function() {
      //open menu
      sidebar.addClass('sidebar-active');
      //make hamburger shape change
      hamburger.addClass('fa-times');
      hamburger.removeClass('fa-bars');
      //show text and arrow
      $(".sidebar-item").removeClass("hidden");
      $(".sidebar-item").addClass("inline");
      $("section").addClass("blur2");
  })

  sidebar.on('mouseleave', function () {
    if (sidebar.hasClass('sidebar-active')) { // if menu is opened
      //close menu by removing active class
      sidebar.removeClass('sidebar-active');
      //make hamburger shape change
      hamburger.removeClass('fa-times');
      hamburger.addClass('fa-bars');
      //hide text and arrow
      $(".sidebar-item").addClass("hidden");
      $(".sidebar-item").removeClass("inline");
      //hide/close all opened submenues
      $('.aside-item').hide();
      //change all arrows which are up to down
      $('.arrow').removeClass('fa-angle-up');
      $('.arrow').addClass('fa-angle-down');
    }
      $("section").removeClass("blur2");
  });

function tab(tab) {
    $('a[href="#' + tab + '"]').tab('show');
}

//open close submenu
$(function () {
  var asideArrow = $('.asideArrow');
  asideArrow.on('click', function () {
    //find on which arrow is clicked
    var num = this.id.match(/\d+/)[0];
    //toggle submenu on click
    $('#aside-item_' + num).slideToggle();
    //change arrow on up or down
    if ($('#arrow-collapse_' + num).hasClass('fa-angle-down')) {
      $('#arrow-collapse_' + num).addClass('fa-angle-up');
      $('#arrow-collapse_' + num).removeClass('fa-angle-down');
    } else {
      $('#arrow-collapse_' + num).addClass('fa-angle-down');
      $('#arrow-collapse_' + num).removeClass('fa-angle-up');
    }
  });
});


//when chekbox is cheked button is enabled, otherwise it is disabled
$(function () {
  $('.form-checkbox').click(function () {
    if ($('.form-checkbox:checked').length > 0) {
      $('.disabled-btn').removeAttr('disabled');
    } else {
      $('.disabled-btn').attr('disabled', 'disabled');
    }
  });
});

$(document).ready(function () {
  //this will execute on page load(to be more specific when document ready event occurs)
  if ($('.activity-card').length > 6) {
    $('.activity-card:gt(6)').hide();
    $('.activity-showMore').show();
    $(this).text('Show more');
  }

  $('.activity-showMore').on('click', function () {
    //toggle elements with class .ty-compact-list that their index is bigger than 2
    $('.activity-card:gt(6)').toggle();
    //change text of show more element just for demonstration purposes to this demo
    if ($(this).text() == 'Show less') {
      $(this).text('Show more')
    } else {
      $(this).text('Show less');
    }
  });

  // Form
  $(".forma").submit(function (e) {
    // e.preventDefault();
  });

  // Open Modal
  modal = $(".modal");
  $(".show-modal").on('click', function () {
    modal.removeClass('hidden');
  })
  // Close Modal
  $(".close-modal").on('click', function () {
    modal.addClass('hidden');
  })

  // Vrati Knjigu Modal
  vratiModal = $(".vrati-modal");
  $(".show-vratiModal").on('click', function () {
    vratiModal.removeClass('hidden');
  })
  // Close Modal
  $(".close-modal").on('click', function () {
    vratiModal.addClass('hidden');
  })

  // Otpiši Knjigu Modal
  otpisiModal = $(".otpisi-modal");
  $(".show-otpisiModal").on('click', function () {
    otpisiModal.removeClass('hidden');
  })
  // Close Modal
  $(".otpisi-modal").on('click', function () {
    otpisiModal.addClass('hidden');
  })

  // Izbriši Zapis Modal
  izbrisiModal = $(".izbrisi-modal");
  $(".show-izbrisiModal").on('click', function () {
    izbrisiModal.removeClass('hidden');
  })
  // Close Modal
  $(".izbrisi-modal").on('click', function () {
    izbrisiModal.addClass('hidden');
  })
});

function AddReadMore() {
  //This limit you can set after how much characters you want to show Read More.
  var carLmt = 1000;
  // Text to show when text is collapsed
  var readMoreTxt = " ... Prikaži vise &#8681;";
  // Text to show when text is expanded
  var readLessTxt = " Prikaži manje &#8657;";


  //Traverse all selectors with this class and manupulate HTML part to show Read More
  $(".addReadMore").each(function () {
    if ($(this).find(".firstSec").length)
      return;

    var allstr = $(this).text();
    if (allstr.length > carLmt) {
      var firstSet = allstr.substring(0, carLmt);
      var secdHalf = allstr.substring(carLmt, allstr.length);
      var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
      $(this).html(strtoadd);
    }

  });
  //Read More and Read Less Click Event binding
  $(document).on("click", ".readMore,.readLess", function () {
    $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
  });
}

$(function () {
  //Calling function after Page Load
  AddReadMore();
});

// File upload
function dataFileDnD() {
  return {
    files: [],
    fileDragging: null,
    fileDropping: null,
    humanFileSize(size) {
      const i = Math.floor(Math.log(size) / Math.log(1024));
      return (
        (size / Math.pow(1024, i)).toFixed(2) * 1 +
        " " + ["B", "kB", "MB", "GB", "TB"][i]
      );
    },
    remove(index) {
      let files = [...this.files];
      files.splice(index, 1);

      this.files = createFileList(files);
    },
    drop(e) {
      let removed, add;
      let files = [...this.files];

      removed = files.splice(this.fileDragging, 1);
      files.splice(this.fileDropping, 0, ...removed);

      this.files = createFileList(files);

      this.fileDropping = null;
      this.fileDragging = null;
    },
    dragenter(e) {
      let targetElem = e.target.closest("[draggable]");

      this.fileDropping = targetElem.getAttribute("data-index");
    },
    dragstart(e) {
      this.fileDragging = e.target
        .closest("[draggable]")
        .getAttribute("data-index");
      e.dataTransfer.effectAllowed = "move";
    },
    loadFile(file) {
      const preview = document.querySelectorAll(".preview");
      const blobUrl = URL.createObjectURL(file);

      preview.forEach(elem => {
        elem.onload = () => {
          URL.revokeObjectURL(elem.src); // free memory
        };
      });

      return blobUrl;
    },
    addFiles(e) {
      const files = createFileList([...this.files], [...e.target.files]);
      this.files = files;
      // this.form.formData.files = [...files];
    }
  };
}

// Student image upload
var loadFileStudent = function (event) {
  // var imageStudent = document.getElementById('image-output');
  // imageStudent.style.display = "block";
  // imageStudent.src = URL.createObjectURL(event.target.files[0]);
};

// Load cropper overlay
var cropperFunction = function (e) {
  var cropperOverlay = document.getElementById('cropper-wrapper');
  var cropperPreview = document.getElementById('cropper-preview');
  var croppedOutput = document.getElementById('image-output');
  var cropperCropBtn = document.getElementById('cropper-crop-btn');
  var cropperCancleBtn = document.getElementById('cropper-cancle-btn');
  var form = document.getElementById('form');

  console.log()

  var cropper;

  // load cropper overlay and crop image
  console.log(e.target.files[0]);
  if(e.target.files && e.target.files[0]) {

    // file reader API
    var reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function (e) {

      // setup cropper
      cropperPreview.src = e.target.result;
      cropper = new Cropper(cropperPreview);
      cropperOverlay.style.display = 'block';
    }

    // save cropped data
    cropperCropBtn.addEventListener('click', function (e) {

      // get cropped data from cropper && display cropped image into output block
      cropper.getCroppedCanvas().toBlob(blob => {
        var file = new File([blob], Date.now(), { type: blob.type });
        var container = new DataTransfer();

        container.items.add(file);

        var input = document.createElement('input');
        input.name = "photoPath";
        input.type = 'file';
        input.files = container.files;
        input.classList.add('hidden');
        form.appendChild(input);

        croppedOutput.style.display = 'block';
        croppedOutput.src = URL.createObjectURL(blob);
      });

      // destroy cropper and cropper overlay
      cropper.destroy();
      cropperOverlay.style.display = 'none';
      $('input[type="file"]').val('');
    });

    // reject cropped data
    cropperCancleBtn.addEventListener('click', function(e) {
      cropper.destroy();
      cropper = null;
      cropperOverlay.style.display = 'none';
      $('input[type="file"]').val('');
    });
  }

}

$('#deleteProfilePhotoModal form').submit(function () {
    event.preventDefault();
    var form = document.getElementById('deleteProfilePhotoModal').querySelector('form');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        success: function (data) {
            $('#deleteProfilePhotoModal .close-modal').click();
            $('input[type="file"]').val('');
            $('#image-output').attr('src', '/img/profile.jpg');
            flashMsg('Profilna slika uspješno obrisana', 'success');
        }
    })
})

$('.deletePhotoCreate').on('click', function () {
    $('input[type="file"]').val('');
    $('#image-output').removeAttr('src');
    $('#image-output').removeAttr('style');
})

// Librarian image upload
var loadFileLibrarian = function (event) {
  // var imageStudent = document.getElementById('image-output');
  // imageStudent.style.display = "block";
  // imageStudent.src = URL.createObjectURL(event.target.files[0]);
};

// Category icon upload
$("#icon-upload").change(function () {
  $("#icon-output").text(this.files[0].name);
});

function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (x.children.length == 2) {
        if (x.children[1].children.length == 1) {
          let [firstName, secondName] = [x.children[1].children[0], y.children[1].children[0]]
          //check if the two rows should switch place:
          if (firstName.innerHTML.toLowerCase() > secondName.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else {
          let [firstName1, secondName1] = [x.children[1], y.children[1]]
          if (firstName1.innerHTML.toLowerCase() > secondName1.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      } else if (x.children.length == 1) {
        let [firstName2, secondName2] = [x.children[0], y.children[0]]
        if (firstName2.innerHTML.toLowerCase() > secondName2.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
//rezervacije promjena statusa
let rezervacije = $('.rezervacije');
rezervacije.on('click', (event) => {
  if (event.target.classList.contains('reservedStatus')) {
    event.target.closest('.changeStatus').classList.add('hidden');
    event.target.closest('.changeStatus').nextElementSibling.classList.remove('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove('hidden');
    event.target.closest('.changeBg').classList.remove('bg-gray-200');
  }
  if (event.target.classList.contains('deniedStatus')) {
    event.target.closest('.changeStatus').classList.add('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.classList.remove('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove('hidden');
    event.target.closest('.changeBg').classList.remove('bg-gray-200');
  }

})
//ucenikEvidencija, evidencijaIznajmljivanja - funkcija promjene statusa
$(".reservedBook").click(function () {
  var checkMark = $(this);
  var changeColorStatus = checkMark.closest("tr").find(".borderColor")
  var changeTextStatus = checkMark.closest("tr").find(".borderText")
  changeColorStatus.removeClass('border-yellow-500')
  changeColorStatus.removeClass('bg-transparent')
  changeColorStatus.addClass('bg-yellow-200')
  changeTextStatus.text('Potvrđene rezervacije')
  changeTextStatus.removeClass('text-yellow-500')
  changeTextStatus.addClass('text-yellow-700')
  checkMark.parent().addClass('hidden')
  checkMark.parent().next().removeClass('hidden')
  var backgroundRowChange = checkMark.closest("tr")
  backgroundRowChange.removeClass('bg-gray-200')
})

$(".deniedBook").click(function () {
  var checkMark = $(this);
  var changeColorStatus = checkMark.closest("tr").find(".borderColor")
  var changeTextStatus = checkMark.closest("tr").find(".borderText")
  changeColorStatus.removeClass('border-yellow-500')
  changeColorStatus.removeClass('bg-transparent')
  changeColorStatus.addClass('bg-red-200')
  changeTextStatus.text('Odbijene rezervacije')
  changeTextStatus.removeClass('text-yellow-500')
  changeTextStatus.addClass('text-red-800')
  checkMark.parent().addClass('hidden')
  checkMark.parent().next().removeClass('hidden')
  var backgroundRowChange = checkMark.closest("tr")
  backgroundRowChange.removeClass('bg-gray-200')
})

// Form validation for new librarian
function validacijaBibliotekar(event) {

  $("#validateNameBibliotekar").empty();
  $("#validateSurnameBibliotekar").empty();
  $("#validateJmbgBibliotekar").empty();
  $("#validateEmailBibliotekar").empty();
  $("#validateUsernameBibliotekar").empty();
  $("#validatePwBibliotekar").empty();
  $("#validatePw2Bibliotekar").empty();


  let nameBibliotekar = $("#imeBibliotekar").val();
  let surnameBibliotekar = $("#prezimeBibliotekar").val();
  let jmbgBibliotekar = $("#jmbgBibliotekar").val();
  let emailBibliotekar = $("#emailBibliotekar").val();
  let usernameBibliotekar = $("#usernameBibliotekar").val();
  let pwBibliotekar = $("#pwBibliotekar").val();
  let pw2Bibliotekar = $("#pw2Bibliotekar").val();

  if (nameBibliotekar.length == 0) {
    $('#validateNameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti ime!</p>');
    event.preventDefault();
  }
  if (surnameBibliotekar.length == 0) {
    $('#validateSurnameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti prezime!</p>');
    event.preventDefault();
  }

    if (isNaN(jmbgBibliotekar)){
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
        event.preventDefault();
    } else if (jmbgBibliotekar.length == 0) {
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
        event.preventDefault();
    } else if (jmbgBibliotekar.length !== 13) {
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgBibliotekar.length + '</p>');
        event.preventDefault();
    }

  if (emailBibliotekar.length == 0) {
    $('#validateEmailBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
    event.preventDefault();
  }

  if (usernameBibliotekar.length == 0) {
    $('#validateUsernameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    event.preventDefault();
  } else if (!(usernameBibliotekar.match(unameRegEx))) {
    $('#validateUsernameBibliotekar').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
    event.preventDefault();
  }

  if (pwBibliotekar.length == 0) {
    $('#validatePwBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti šifru!</p>');
    event.preventDefault();
  }

  if (pwBibliotekar.length < 8){
    $('#validatePwBibliotekar').append('<p style="color:red;font-size:13px;">Šifra mora imati barem 8 karaktera! Trenutno: ' + pwBibliotekar.length + '</p>');
    event.preventDefault();
  }

  if (pw2Bibliotekar.length == 0) {
    $('#validatePw2Bibliotekar').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
    event.preventDefault();
  }

  if (pwBibliotekar !== pw2Bibliotekar){
      $('#validatePwBibliotekar').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
      $('#validatePw2Bibliotekar').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
      event.preventDefault();
  }
}

function jmbgCheckLC() {
    $("#validateJmbgBibliotekar").empty();
    $("#jmbgLabel").attr('style', 'color:red;')
    let jmbgBibliotekar = $("#jmbgBibliotekar").val();
    if (isNaN(jmbgBibliotekar)){
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
    } else if (jmbgBibliotekar.length == 0) {
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
    } else if (jmbgBibliotekar.length !== 13) {
        $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgBibliotekar.length + '</p>');
    } else {
        $("#jmbgLabel").attr('style', 'color:green;')
    }
}

function jmbgCheckLE() {
    $("#validateJmbgBibliotekarEdit").empty();
    $("#jmbgLabel").attr('style', 'color:red;')
    let jmbgBibliotekar = $("#jmbgBibliotekarEdit").val();
    if (isNaN(jmbgBibliotekar)){
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
    } else if (jmbgBibliotekar.length == 0) {
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
    } else if (jmbgBibliotekar.length !== 13) {
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgBibliotekar.length + '</p>');
    } else {
        $("#jmbgLabel").attr('style', 'color:green;')
    }
}

function usernameCheckLC() {
    $("#unameLabel").attr('style', 'color:red;');
    $("#validateUsernameBibliotekar").empty();
    let usernameBibliotekar = $("#usernameBibliotekar").val();
    if (usernameBibliotekar.length == 0) {
        $('#validateUsernameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    } else if (!(usernameBibliotekar.match(unameRegEx))) {
        $('#validateUsernameBibliotekar').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
    } else {
        $("#unameLabel").attr('style', 'color:green;');
    }
}

function usernameCheckLE() {
    $("#unameLabel").attr('style', 'color:red;');
    $("#validateUsernameBibliotekarEdit").empty();
    let usernameBibliotekarEdit = $("#usernameBibliotekarEdit").val();
    if (usernameBibliotekarEdit.length == 0) {
        $('#validateUsernameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    } else if (!(usernameBibliotekarEdit.match(unameRegEx))) {
        $('#validateUsernameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
    } else {
        $("#unameLabel").attr('style', 'color:green;');
    }
}


function clearErrorsNameBibliotekar() {
  $("#validateNameBibliotekar").empty();
}
function clearErrorsSurnameBibliotekar() {
  $("#validateSurnameBibliotekar").empty();
}

function clearErrorsJmbgBibliotekar() {
  $("#validateJmbgBibliotekar").empty();
}

function clearErrorsEmailBibliotekar() {
  $("#validateEmailBibliotekar").empty();
}

function clearErrorsUsernameBibliotekar() {
  $("#validateUsernameBibliotekar").empty();
}

function clearErrorsPwBibliotekar() {
  $("#validatePwBibliotekar").empty();
}

function clearErrorsPw2Bibliotekar() {
  $("#validatePw2Bibliotekar").empty();
}

$("#sacuvajBibliotekara").keypress(function (e) {
  if (e.which == 13) {
    validacijaBibliotekar();
    return false;
  }
});

// Form validation for editing librarian info
function validacijaBibliotekarEdit(event) {

  $("#validateNameBibliotekarEdit").empty();
  $("#validateJmbgBibliotekarEdit").empty();
  $("#validateEmailBibliotekarEdit").empty();
  $("#validateUsernameBibliotekarEdit").empty();
  $("#validatePwBibliotekarEdit").empty();
  $("#validatePw2BibliotekarEdit").empty();


  let nameBibliotekarEdit = $("#imeBibliotekarEdit").val();
  let surnameBibliotekarEdit = $("#prezimeBibliotekarEdit").val();
  let jmbgBibliotekarEdit = $("#jmbgBibliotekarEdit").val();
  let emailBibliotekarEdit = $("#emailBibliotekarEdit").val();
  let usernameBibliotekarEdit = $("#usernameBibliotekarEdit").val();
  let pwBibliotekarEdit = $("#pwBibliotekarEdit").val();
  let pw2BibliotekarEdit = $("#pw2BibliotekarEdit").val();

  if (nameBibliotekarEdit.length == 0) {
    $('#validateNameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime!</p>');
    event.preventDefault();
  }
  if (surnameBibliotekarEdit.length == 0) {
    $('#validateSurnameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti prezime!</p>');
    event.preventDefault();
  }

    if (isNaN(jmbgBibliotekarEdit)){
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
        event.preventDefault();
    } else if (jmbgBibliotekarEdit.length == 0) {
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
        event.preventDefault();
    } else if (jmbgBibliotekarEdit.length !== 13) {
        $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgBibliotekarEdit.length + '</p>');
        event.preventDefault();
    }

  if (emailBibliotekarEdit.length == 0) {
    $('#validateEmailBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
    event.preventDefault();
  }

  if (usernameBibliotekarEdit.length == 0) {
    $('#validateUsernameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    event.preventDefault();
  } else if (!(usernameBibliotekarEdit.match(unameRegEx))) {
      $('#validateUsernameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
      event.preventDefault();
  }

    if (pwBibliotekarEdit.length < 8 && pwBibliotekarEdit.length > 0){
        $('#validatePwBibliotekarEdit').append('<p style="color:red;font-size:13px;">Šifra mora imati barem 8 karaktera! Trenutno: ' + pwBibliotekarEdit.length + '</p>');
        event.preventDefault();
    }

    if (pw2BibliotekarEdit.length == 0 && pwBibliotekarEdit.length > 0) {
        $('#validatePw2BibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
        event.preventDefault();
    }

    if (pwBibliotekarEdit !== pw2BibliotekarEdit){
        $('#validatePwBibliotekarEdit').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        $('#validatePw2BibliotekarEdit').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        event.preventDefault();
    }
}

function clearErrorsNameBibliotekarEdit() {
  $("#validateNameBibliotekarEdit").empty();
}
function clearErrorsSurnameBibliotekarEdit() {
  $("#validateSurnameBibliotekarEdit").empty();
}

function clearErrorsJmbgBibliotekarEdit() {
  $("#validateJmbgBibliotekarEdit").empty();
}

function clearErrorsEmailBibliotekarEdit() {
  $("#validateEmailBibliotekarEdit").empty();
}

function clearErrorsUsernameBibliotekarEdit() {
  $("#validateUsernameBibliotekarEdit").empty();
}

function clearErrorsPwBibliotekarEdit() {
  $("#validatePwBibliotekarEdit").empty();
}

function clearErrorsPw2BibliotekarEdit() {
  $("#validatePw2BibliotekarEdit").empty();
}

$("#sacuvajBibliotekaraEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaBibliotekarEdit();
    return false;
  }
});

// Form validation for new student
function validacijaUcenik(event) {

  $("#validateNameUcenik").empty();
  $("#validateSurnameUcenik").empty();
  $("#validateJmbgUcenik").empty();
  $("#validateEmailUcenik").empty();
  $("#validateUsernameUcenik").empty();
  $("#validatePwUcenik").empty();
  $("#validatePw2Ucenik").empty();


  let nameUcenik = $("#imeUcenik").val();
  let surnameUcenik = $("#prezimeUcenik").val();
  let jmbgUcenik = $("#jmbgUcenik").val();
  let emailUcenik = $("#emailUcenik").val();
  let usernameUcenik = $("#usernameUcenik").val();
  let pwUcenik = $("#pwUcenik").val();
  let pw2Ucenik = $("#pw2Ucenik").val();

  if (nameUcenik.length == 0) {
    $('#validateNameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti ime!</p>');
    event.preventDefault();
  }

  if (surnameUcenik.length == 0) {
    $('#validateSurnameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti prezime!</p>');
    event.preventDefault();
  }

    if (isNaN(jmbgUcenik)){
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
        event.preventDefault();
    } else if (jmbgUcenik.length == 0) {
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
        event.preventDefault();
    } else if (jmbgUcenik.length !== 13) {
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgUcenik.length + '</p>');
        event.preventDefault();
    }

  if (emailUcenik.length == 0) {
    $('#validateEmailUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
    event.preventDefault();
  }

  if (usernameUcenik.length == 0) {
    $('#validateUsernameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    event.preventDefault();
  } else if (!(usernameUcenik.match(unameRegEx))){
      $('#validateUsernameUcenik').append('<p style="color:red;font-size:13px;">Korisnčko ime je pogrešnog formata!</p>');
      event.preventDefault();
  }

    if (pwUcenik.length == 0) {
        $('#validatePwUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti šifru!</p>');
        event.preventDefault();
    }

    if (pwUcenik.length < 8){
        $('#validatePwUcenik').append('<p style="color:red;font-size:13px;">Šifra mora imati barem 8 karaktera! Trenutno: ' + pwUcenik.length + '</p>');
        event.preventDefault();
    }

    if (pw2Ucenik.length == 0) {
        $('#validatePw2Ucenik').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
        event.preventDefault();
    }

    if (pwUcenik !== pw2Ucenik){
        $('#validatePwUcenik').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        $('#validatePw2Ucenik').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        event.preventDefault();
    }
}

function jmbgCheckSC() {
    $("#validateJmbgUcenik").empty();
    $("#jmbgLabel").attr('style', 'color:red;')
    let jmbgUcenik = $("#jmbgUcenik").val();

    if (isNaN(jmbgUcenik)){
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
    } else if (jmbgUcenik.length == 0) {
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
    } else if (jmbgUcenik.length !== 13) {
        $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgUcenik.length + '</p>');
    } else {
        $("#jmbgLabel").attr('style', 'color:green;')
    }
}

function jmbgCheckSE() {
    $("#validateJmbgUcenikEdit").empty();
    $("#jmbgLabel").attr('style', 'color:red;')
    let jmbgUcenik = $("#jmbgUcenikEdit").val();

    if (isNaN(jmbgUcenik)){
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
    } else if (jmbgUcenik.length == 0) {
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
    } else if (jmbgUcenik.length !== 13) {
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgUcenik.length + '</p>');
    } else {
        $("#jmbgLabel").attr('style', 'color:green;')
    }
}

function usernameCheckSC() {
    $("#validateUsernameUcenik").empty();
    let usernameUcenik = $("#usernameUcenik").val();
    $("#unameLabel").attr('style', 'color:red;');
    if (usernameUcenik.length == 0) {
        $('#validateUsernameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    } else if (!(usernameUcenik.match(unameRegEx))){
        $('#validateUsernameUcenik').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
    } else {
        $("#unameLabel").attr('style', 'color:green;');
    }
}

function usernameCheckSE() {
    $("#validateUsernameUcenikEdit").empty();
    let usernameUcenikEdit = $("#usernameUcenikEdit").val();
    $("#unameLabel").attr('style', 'color:red;');
    if (usernameUcenikEdit.length == 0) {
        $('#validateUsernameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
    } else if (!(usernameUcenikEdit.match(unameRegEx))){
        $('#validateUsernameUcenikEdit').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
    } else {
        $("#unameLabel").attr('style', 'color:green;');
    }
}

function clearErrorsNameUcenik() {
  $("#validateNameUcenik").empty();
}

function clearErrorsSurnameUcenik() {
    $("#validateSurnameUcenik").empty();
}
function clearErrorsJmbgUcenik() {
  $("#validateJmbgUcenik").empty();
}

function clearErrorsEmailUcenik() {
  $("#validateEmailUcenik").empty();
}

function clearErrorsUsernameUcenik() {
  $("#validateUsernameUcenik").empty();
}

function clearErrorsPwUcenik() {
  $("#validatePwUcenik").empty();
}

function clearErrorsPw2Ucenik() {
  $("#validatePw2Ucenik").empty();
}

$("#sacuvajUcenika").keypress(function (e) {
  if (e.which == 13) {
    validacijaUcenik();
    return false;
  }
});

// Form validation for editing student info
function validacijaUcenikEdit(event) {

  $("#validateNameUcenikEdit").empty();
  $("#validateSurnameUcenikEdit").empty();
  $("#validateJmbgUcenikEdit").empty();
  $("#validateEmailUcenikEdit").empty();
  $("#validateUsernameUcenikEdit").empty();
  $("#validatePwUcenikEdit").empty();
  $("#validatePw2UcenikEdit").empty();


  let nameUcenikEdit = $("#imeUcenikEdit").val();
  let surnameUcenikEdit = $("#prezimeUcenikEdit").val();
  let jmbgUcenikEdit = $("#jmbgUcenikEdit").val();
  let emailUcenikEdit = $("#emailUcenikEdit").val();
  let usernameUcenikEdit = $("#usernameUcenikEdit").val();
  let pwUcenikEdit = $("#pwUcenikEdit").val();
  let pw2UcenikEdit = $("#pw2UcenikEdit").val();

  if (nameUcenikEdit.length == 0) {
    $('#validateNameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime!</p>');
    event.preventDefault();
  }

  if (surnameUcenikEdit.length == 0) {
        $('#validatesurnameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti prezime!</p>');
      event.preventDefault();
  }

    if (isNaN(jmbgUcenikEdit)){
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">JMBG je pogrešnog formata!</p>');
        event.preventDefault();
    } else if (jmbgUcenikEdit.length == 0) {
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
        event.preventDefault();
    } else if (jmbgUcenikEdit.length !== 13) {
        $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">JMBG mora imati 13 cifara! Trenutno:' + jmbgUcenikEdit.length + '</p>');
        event.preventDefault();
    }

  if (emailUcenikEdit.length == 0) {
    $('#validateEmailUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
      event.preventDefault();
  }

  if (usernameUcenikEdit.length == 0) {
    $('#validateUsernameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisničko ime!</p>');
      event.preventDefault();
  } else if (!(usernameUcenikEdit.match(unameRegEx))){
      $('#validateUsernameUcenikEdit').append('<p style="color:red;font-size:13px;">Korisničko ime je pogrešnog formata!</p>');
      event.preventDefault();
  }

    if (pwUcenikEdit.length < 8 && pwUcenikEdit.length > 0){
        $('#validatePwUcenikEdit').append('<p style="color:red;font-size:13px;">Šifra mora imati barem 8 karaktera! Trenutno: ' + pwUcenikEdit.length + '</p>');
        event.preventDefault();
    }

    if (pw2UcenikEdit.length == 0 && pwUcenikEdit.length > 0) {
        $('#validatePw2UcenikEdit').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
        event.preventDefault();
    }

    if (pwUcenikEdit !== pw2UcenikEdit){
        $('#validatePwUcenikEdit').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        $('#validatePw2UcenikEdit').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        event.preventDefault();
    }
}

function clearErrorsNameUcenikEdit() {
  $("#validateNameUcenikEdit").empty();
}
function clearErrorsSurnameUcenikEdit() {
    $("#validateSurnameUcenikEdit").empty();
}

function clearErrorsJmbgUcenikEdit() {
  $("#validateJmbgUcenikEdit").empty();
}

function clearErrorsEmailUcenikEdit() {
  $("#validateEmailUcenikEdit").empty();
}

function clearErrorsUsernameUcenikEdit() {
  $("#validateUsernameUcenikEdit").empty();
}

function clearErrorsPwUcenikEdit() {
  $("#validatePwUcenikEdit").empty();
}

function clearErrorsPw2UcenikEdit() {
  $("#validatePw2UcenikEdit").empty();
}

$("#sacuvajUcenikaEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaUcenikEdit();
    return false;
  }
});

// Form validation for new book
function validacijaKnjiga(event) {

    //validacija za osnovne detalje
    validacijaKnjigaOD(event);

//    validacija za specifikaciju
    validacijaKnjigaSpec(event);
}

function isbnCheck() {
    $("#validateIsbn").empty();
    $('#isbnLabel').attr('style', 'color:red;')
    let isbn = $("#isbn").val();
    if (isNaN(isbn)){
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">ISBN je pogrešnog formata!</p>');
    } else if (isbn.length == 0) {
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
    } else if (isbn.length !== 13){
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">ISBN mora imati 13 cifara! Trenutno:' + isbn.length + '</p>');
    } else {
        $('#isbnLabel').attr('style', 'color:green;')
    }
}

//validacija za osnovne detalje
function validacijaKnjigaOD(event, nextTab= null) {
    //  osnovni detalji
    $("#validateNazivKnjiga").empty();
    $("#validateKategorija").empty();
    $("#validateZanr").empty();
    $("#validateAutori").empty();
    $("#validateIzdavac").empty();
    $("#validateGodinaIzdavanja").empty();
    $("#validateKnjigaKolicina").empty();

    //osnovni detalji
    let nazivKnjiga = $("#nazivKnjiga").val();
    let kategorija = $("#kategorijaInput").val();
    let zanr = $("#zanroviInput").val();
    let autori = $("#autoriInput").val();
    let izdavac = $("#izdavac").val();
    let godinaIzdavanja = $("#godinaIzdavanja").val();
    let knjigaKolicina = $("#knjigaKolicina").val();

    var errors = 0;

    //  osnovni detalji
    if (nazivKnjiga.length == 0) {
        $('#validateNazivKnjiga').append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>');
        event.preventDefault();
        errors++;
    }

    if (kategorija.length == 0) {
        $('#validateKategorija').append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>');
        event.preventDefault();
        errors++;
    }

    if (zanr.length == 0) {
        $('#validateZanr').append('<p style="color:red;font-size:13px;">Morate selektovati žanr!</p>');
        event.preventDefault();
        errors++;
    }

    if (autori.length == 0) {
        $('#validateAutori').append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>');
        event.preventDefault();
        errors++;
    }

    if (izdavac == null) {
        $('#validateIzdavac').append('<p style="color:red;font-size:13px;">Morate selektovati izdavača!</p>');
        event.preventDefault();
        errors++;
    }

    if (godinaIzdavanja == null) {
        $('#validateGodinaIzdavanja').append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>');
        event.preventDefault();
        errors++;
    }

    if (knjigaKolicina.length == 0) {
        $('#validateKnjigaKolicina').append('<p style="color:red;font-size:13px;">Morate unijeti količinu!</p>');
        event.preventDefault();
        errors++;
    }

    if (errors === 0) {
        if (!(nextTab === null)) {
            tab(nextTab)
        }
    }
}

//validacija za specifikaciju knjige
function validacijaKnjigaSpec(event, nextTab = null) {
    //specifikacija
    $("#validateBrStrana").empty();
    $("#validatePismo").empty();
    $("#validatePovez").empty();
    $("#validateFormat").empty();
    $("#validateIsbn").empty();
    $('#validateJezik').empty();


    // specifikacija
    let brStrana = $("#brStrana").val();
    let pismo = $("#pismo").val();
    let povez = $("#povez").val();
    let format = $("#format").val();
    let isbn = $("#isbn").val();
    let jezik = $("#jezik").val();

    var errors = 0;

    //  specifikacija
    if (brStrana.length == 0) {
        $('#validateBrStrana').append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>');
        event.preventDefault();
        errors++;
    }

    if (pismo == null) {
        $('#validatePismo').append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>');
        event.preventDefault();
        errors++;
    }

    if (jezik == null) {
        $('#validateJezik').append('<p style="color:red;font-size:13px;">Morate selektovati jezik!</p>');
        event.preventDefault();
        errors++;
    }

    if (povez == null) {
        $('#validatePovez').append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>');
        event.preventDefault();
        errors++;
    }

    if (format == null) {
        $('#validateFormat').append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>');
        event.preventDefault();
        errors++;
    }

    if (isNaN(isbn)){
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">ISBN je pogrešnog formata!</p>');
        event.preventDefault();
        errors++;
    } else if (isbn.length == 0) {
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
        event.preventDefault();
        errors++;
    } else if (isbn.length !== 13){
        $('#validateIsbn').append('<p style="color:red;font-size:13px;">ISBN mora imati 13 cifara! Trenutno:' + isbn.length + '</p>');
        event.preventDefault();
        errors++;
    }

    if (errors === 0) {
        if (!(nextTab === null)) {
            tab(nextTab)
        }
    }
}

function clearErrorsNazivKnjiga() {
  $("#validateNazivKnjiga").empty();
}

function clearErrorsKategorija() {
  $("#validateKategorija").empty();
}

function clearErrorsZanr() {
  $("#validateZanr").empty();
}

function clearErrorsAutori() {
  $("#validateAutori").empty();
}

function clearErrorsIzdavac() {
  $("#validateIzdavac").empty();
}

function clearErrorsGodinaIzdavanja() {
  $("#validateGodinaIzdavanja").empty();
}

function clearErrorsKnjigaKolicina() {
  $("#validateKnjigaKolicina").empty();
}

$("#sacuvajKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaKnjiga();
    return false;
  }
});

// Form validation for editing book info
function validacijaKnjigaEdit() {

  $("#validateNazivKnjigaEdit").empty();
  $("#validateKategorijaEdit").empty();
  $("#validateZanrEdit").empty();
  $("#validateAutoriEdit").empty();
  $("#validateIzdavacEdit").empty();
  $("#validateGodinaIzdavanjaEdit").empty();
  $("#validateKnjigaKolicinaEdit").empty();


  let nazivKnjigaEdit = $("#nazivKnjigaEdit").val();
  let kategorijaInputEdit = $("#kategorijaInputEdit").val();
  let zanroviInputEdit = $("#zanroviInputEdit").val();
  let autoriInputEdit = $("#autoriInputEdit").val();
  let izdavacEdit = $("#izdavacEdit").val();
  let godinaIzdavanjaEdit = $("#godinaIzdavanjaEdit").val();
  let knjigaKolicinaEdit = $("#knjigaKolicinaEdit").val();

  if (nazivKnjigaEdit.length == 0) {
    $('#validateNazivKnjigaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>');
  }

  if (kategorijaInputEdit.length == 0) {
    $('#validateKategorijaEdit').append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>');
  }

  if (zanroviInputEdit.length == 0) {
    $('#validateZanrEdit').append('<p style="color:red;font-size:13px;">Morate selektovati zanr!</p>');
  }

  if (autoriInputEdit.length == 0) {
    $('#validateAutoriEdit').append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>');
  }

  if (izdavacEdit == null) {
    $('#validateIzdavacEdit').append('<p style="color:red;font-size:13px;">Morate selektovati izdavača!</p>');
  }

  if (godinaIzdavanjaEdit == null) {
    $('#validateGodinaIzdavanjaEdit').append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>');
  }

  if (knjigaKolicinaEdit.length == 0) {
    $('#validateKnjigaKolicinaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti količinu!</p>');
  }
}

function clearErrorsNazivKnjigaEdit() {
  $("#validateNazivKnjigaEdit").empty();
}

function clearErrorsKategorijaEdit() {
  $("#validateKategorijaEdit").empty();
}

function clearErrorsZanrEdit() {
  $("#validateZanrEdit").empty();
}

function clearErrorsAutoriEdit() {
  $("#validateAutoriEdit").empty();
}

function clearErrorsIzdavacEdit() {
  $("#validateIzdavacEdit").empty();
}

function clearErrorsGodinaIzdavanjaEdit() {
  $("#validateGodinaIzdavanjaEdit").empty();
}

function clearErrorsKnjigaKolicinaEdit() {
  $("#validateKnjigaKolicinaEdit").empty();
}

$("#sacuvajKnjiguEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaKnjigaEdit();
    return false;
  }
});

function clearErrorsBrStrana() {
  $("#validateBrStrana").empty();
}

function clearErrorsPismo() {
  $("#validatePismo").empty();
}

function clearErrorsJezik() {
  $("#validateJezik").empty();
}

function clearErrorsPovez() {
  $("#validatePovez").empty();
}

function clearErrorsFormat() {
  $("#validateFormat").empty();
}

function clearErrorsIsbn() {
  $("#validateIsbn").empty();
}

$("#sacuvajSpecifikaciju").keypress(function (e) {
  if (e.which == 13) {
    validacijaSpecifikacija();
    return false;
  }
});

// Form validation for editing specification of the book
function validacijaSpecifikacijaEdit() {

  $("#validateBrStranaEdit").empty();
  $("#validatePismoEdit").empty();
  $("#validatePovezEdit").empty();
  $("#validateFormatEdit").empty();
  $("#validateIsbnEdit").empty();

  let brStranaEdit = $("#brStranaEdit").val();
  let pismoEdit = $("#pismoEdit").val();
  let povezEdit = $("#povezEdit").val();
  let formatEdit = $("#formatEdit").val();
  let isbnEdit = $("#isbnEdit").val();

  if (brStranaEdit.length == 0) {
    $('#validateBrStranaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>');
  }

  if (pismoEdit == null) {
    $('#validatePismoEdit').append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>');
  }

  if (povezEdit == null) {
    $('#validatePovezEdit').append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>');
  }

  if (formatEdit == null) {
    $('#validateFormatEdit').append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>');
  }

  if (isbnEdit.length == 0) {
    $('#validateIsbnEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
  }
}

function clearErrorsBrStranaEdit() {
  $("#validateBrStranaEdit").empty();
}

function clearErrorsPismoEdit() {
  $("#validatePismoEdit").empty();
}

function clearErrorsPovezEdit() {
  $("#validatePovezEdit").empty();
}

function clearErrorsFormatEdit() {
  $("#validateFormatEdit").empty();
}

function clearErrorsIsbnEdit() {
  $("#validateIsbnEdit").empty();
}

$("#sacuvajSpecifikacijuEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaSpecifikacijaEdit();
    return false;
  }
});

// Form validation for renting books
function validacijaIzdavanje(event) {

  $("#validateUcenikIzdavanje").empty();
  $("#validateDatumIzdavanja").empty();

  let ucenikIzdavanje = $("#ucenikIzdavanje").val();
  let datumIzdavanja = $("#datumIzdavanja").val();

  if (ucenikIzdavanje == null) {
    $('#validateUcenikIzdavanje').append('<p style="color:red;font-size:13px;">Morate selektovati učenika!</p>');
    event.preventDefault();
  }

  if (datumIzdavanja.length == 0) {
    $('#validateDatumIzdavanja').append('<p style="color:red;font-size:13px;">Morate selektovati datum izdavanja!</p>');
    event.preventDefault();
  }
}

function clearErrorsUcenikIzdavanje() {
  $("#validateUcenikIzdavanje").empty();
}

function clearErrorsDatumIzdavanja() {
  $("#validateDatumIzdavanja").empty();
}

$("#izdajKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavanje();
    return false;
  }
});

// Form validation for making reservations
function validacijaRezervisanje(event) {

  $("#validateUcenikRezervisanje").empty();
  $("#validateDatumRezervisanja").empty();

  let ucenikRezervisanje = $("#ucenikRezervisanje").val();
  let datumRezervisanja = $("#datumRezervisanja").val();

  if (ucenikRezervisanje == null) {
    $('#validateUcenikRezervisanje').append('<p style="color:red;font-size:13px;">Morate selektovati učenika!</p>');
    event.preventDefault();
  }

  if (datumRezervisanja.length == 0) {
    $('#validateDatumRezervisanja').append('<p style="color:red;font-size:13px;">Morate selektovati datum rezervisanja!</p>');
    event.preventDefault()
  }
}

function clearErrorsUcenikRezervisanje() {
  $("#validateUcenikRezervisanje").empty();
}

function clearErrorsDatumRezervisanja() {
  $("#validateDatumRezervisanja").empty();
}

$("#rezervisiKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaRezervisanje();
    return false;
  }
});

// Form validation for new category
function validacijaKategorija(event) {

  $("#validateNazivKategorije").empty();
  $("#validateOpisKategorije").empty();

  let nazivKategorije = $("#nazivKategorije").val();
  let opisKategorije = $("#opisKategorije").val();

  if (nazivKategorije.length == 0) {
    $('#validateNazivKategorije').append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
    event.preventDefault();
  }
  if (nazivKategorije.length > 255) {
      $('#validateNazivKategorije').append('<p style="color:red;font-size:13px;">Naziv kategorije je predugačak! Trenutno: ' + nazivKategorije.length + '</p>');
      event.preventDefault();
  }

  if (opisKategorije.length > 60000) {
      $('#validateOpisKategorije').append('<p style="color:red;font-size:13px;">Opis kategorije je predugačak! Trenutno: ' + opisKategorije.length + '</p>');
      event.preventDefault();
  }
}

function clearErrorsNazivKategorije() {
  $("#validateNazivKategorije").empty();
}
function clearErrorsOpisKategorije() {
  $("#validateOpisKategorije").empty();
}

$("#sacuvajKategoriju").keypress(function (e) {
  if (e.which == 13) {
    validacijaKategorija();
    return false;
  }
});

// Form validation for editing category info
function validacijaKategorijaEdit(event) {

  $("#validateNazivKategorijeEdit").empty();
    $("#validateOpisKategorije").empty();

    let nazivKategorijeEdit = $("#nazivKategorijeEdit").val();
    let opisKategorije = $("#opisKategorije").val();

    if (nazivKategorijeEdit.length == 0) {
    $('#validateNazivKategorijeEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
    event.preventDefault();
  }
    if (nazivKategorijeEdit.length > 255) {
        $('#validateNazivKategorijeEdit').append('<p style="color:red;font-size:13px;">Naziv kategorije je predugačak! Trenutno: '+ nazivKategorijeEdit.length +'</p>');
        event.preventDefault();
    }

    if (opisKategorije.length > 60000) {
        $('#validateOpisKategorije').append('<p style="color:red;font-size:13px;">Opis kategorije je predugačak! Trenutno: ' + opisKategorije.length + '</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivKategorijeEdit() {
  $("#validateNazivKategorijeEdit").empty();
}

$("#sacuvajKategorijuEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaKategorijaEdit();
    return false;
  }
});

// Form validation for new author
function validacijaAutor(event) {

  $("#validateImeAutor").empty();
  $("#validatePrezimeAutor").empty();

  let imeAutor = $("#imeAutor").val();
  let prezimeAutor = $("#prezimeAutor").val();

  if (imeAutor.length == 0) {
    $('#validateImeAutor').append('<p style="color:red;font-size:13px;">Morate unijeti ime autora!</p>');
    event.preventDefault();
  }
  if (prezimeAutor.length == 0) {
    $('#validatePrezimeAutor').append('<p style="color:red;font-size:13px;">Morate unijeti prezime autora!</p>');
    event.preventDefault();
  }
}

function clearErrorsImeAutor() {
  $("#validateImeAutor").empty();
}
function clearErrorsPrezimeAutor() {
  $("#validatePrezimeAutor").empty();
}

$("#sacuvajAutora").keypress(function (e) {
  if (e.which == 13) {
    validacijaAutor();
    return false;
  }
});

// Form validation for editing author info
function validacijaAutorEdit(event) {

  $("#validateImeAutorEdit").empty();
  $("#validatePrezimeAutorEdit").empty();

  let imeAutorEdit = $("#imeAutorEdit").val();
  let prezimeAutorEdit = $("#prezimeAutorEdit").val();

  if (imeAutorEdit.length == 0) {
    $('#validateImeAutorEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime autora!</p>');
    event.preventDefault();
  }
  if (prezimeAutorEdit.length == 0) {
    $('#validatePrezimeAutorEdit').append('<p style="color:red;font-size:13px;">Morate unijeti prezime autora!</p>');
    event.preventDefault();
  }
}

function clearErrorsImeAutorEdit() {
  $("#validateImeAutorEdit").empty();
}
function clearErrorsPrezimeAutorEdit() {
  $("#validatePrezimeAutorEdit").empty();
}

$("#sacuvajAutoraEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaAutorEdit();
    return false;
  }
});

// Form validation for new genre
function validacijaZanr(event) {

  $("#validateNazivZanra").empty();

  let nazivZanra = $("#nazivZanra").val();

  if (nazivZanra.length == 0) {
    $('#validateNazivZanra').append('<p style="color:red;font-size:13px;">Morate unijeti naziv žanra!</p>');
    event.preventDefault();
  }
  if (nazivZanra.length > 255) {
      $('#validateNazivZanra').append('<p style="color:red;font-size:13px;">Naziv žanra je predugačak! Trenutno: ' + nazivZanra.length + ', Maksimalno: 255</p>');
      event.preventDefault();
  }
}

function clearErrorsNazivZanra() {
  $("#validateNazivZanra").empty();
}

$("#sacuvajZanr").keypress(function (e) {
  if (e.which == 13) {
    validacijaZanr();
    return false;
  }
});

// Form validation for editing genre info
function validacijaZanrEdit(event) {

  $("#validateNazivZanraEdit").empty();

  let nazivZanraEdit = $("#nazivZanraEdit").val();

  if (nazivZanraEdit.length == 0) {
    $('#validateNazivZanraEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv žanra!</p>');
    event.preventDefault();
  }

  if (nazivZanraEdit.length > 255) {
      $('#validateNazivZanraEdit').append('<p style="color:red;font-size:13px;">Naziv žanra je predugačak! Trenutno: ' + nazivZanraEdit.length + ', Maksimalno: 255</p>');
      event.preventDefault();
  }
}

function clearErrorsNazivZanraEdit() {
  $("#validateNazivZanraEdit").empty();
}

$("#sacuvajZanrEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaZanrEdit();
    return false;
  }
});

// Form validation for new publisher
function validacijaIzdavac(event) {

  $("#validateNazivIzdavac").empty();

  let nazivIzdavac = $("#nazivIzdavac").val();

  if (nazivIzdavac.length == 0) {
    $('#validateNazivIzdavac').append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavača!</p>');
    event.preventDefault();
  }

    if (nazivIzdavac.length > 255) {
        $('#validateNazivIzdavac').append('<p style="color:red;font-size:13px;">Naziv izdavača je predugačak! Trenutno: ' + nazivIzdavac.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }

}

function clearErrorsNazivIzdavac() {
  $("#validateNazivIzdavac").empty();
}

$("#sacuvajIzdavac").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavac();
    return false;
  }
});

// Form validation for new language
function validacijaJezik(event) {

  $("#validateNazivJezik").empty();

  let nazivJezik = $("#nazivJezik").val();

  if (nazivJezik.length == 0) {
    $('#validateNazivJezik').append('<p style="color:red;font-size:13px;">Morate unijeti naziv jezika!</p>');
    event.preventDefault();
  } else {
      if (isNaN(nazivJezik)){

      } else {
          $('#validateNazivJezik').append('<p style="color:red;font-size:13px;">Jezik je pogrešnog formata!</p>');
          event.preventDefault();
      }
  }
}

function clearErrorsNazivJezik() {
  $("#validateNazivJezik").empty();
}

$("#sacuvajJezik").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavac();
    return false;
  }
});

// Form validation for editing publisher info
function validacijaIzdavacEdit(event) {

  $("#validateNazivIzdavacEdit").empty();

  let nazivIzdavacEdit = $("#nazivIzdavacEdit").val();

  if (nazivIzdavacEdit.length == 0) {
    $('#validateNazivIzdavacEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavača!</p>');
    event.preventDefault();
  }
    if (nazivIzdavacEdit.length > 255) {
        $('#validateNazivIzdavacEdit').append('<p style="color:red;font-size:13px;">Naziv izdavača je predugačak! Trenutno: ' + nazivZanraEdit.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivIzdavacEdit() {
  $("#validateNazivIzdavacEdit").empty();
}

$("#sacuvajIzdavacEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavacEdit();
    return false;
  }
});

// Form validation for new book bind
function validacijaPovez(event) {

  $("#validateNazivPovez").empty();

  let nazivPovez = $("#nazivPovez").val();

  if (nazivPovez.length == 0) {
    $('#validateNazivPovez').append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
    event.preventDefault();
  }
    if (nazivPovez.length > 255) {
        $('#validateNazivPovez').append('<p style="color:red;font-size:13px;">Naziv poveza je predugačak! Trenutno: ' + nazivPovez.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivPovez() {
  $("#validateNazivPovez").empty();
}

$("#sacuvajPovez").keypress(function (e) {
  if (e.which == 13) {
    validacijaPovez();
    return false;
  }
});

// Form validation for editing book bind info
function validacijaPovezEdit(event) {

  $("#validateNazivPovezEdit").empty();

  let nazivPovezEdit = $("#nazivPovezEdit").val();

  if (nazivPovezEdit.length == 0) {
    $('#validateNazivPovezEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
    event.preventDefault();
  }

    if (nazivPovezEdit.length > 255) {
        $('#validateNazivPovezEdit').append('<p style="color:red;font-size:13px;">Naziv žanra je predugačak! Trenutno: ' + nazivPovezEdit.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivPovezEdit() {
  $("#validateNazivPovezEdit").empty();
}

$("#sacuvajPovezEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaPovezEdit();
    return false;
  }
});

// Form validation for new book format
function validacijaFormat(event) {

  $("#validateNazivFormat").empty();

  let nazivFormat = $("#nazivFormat").val();

  if (nazivFormat.length == 0) {
    $('#validateNazivFormat').append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
    event.preventDefault();
  }
    if (nazivFormat.length > 255) {
        $('#validateNazivFormat').append('<p style="color:red;font-size:13px;">Naziv formata je predugačak! Trenutno: ' + nazivFormat.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivFormat() {
  $("#validateNazivFormat").empty();
}

$("#sacuvajFormat").keypress(function (e) {
  if (e.which == 13) {
    validacijaFormat();
    return false;
  }
});

// Form validation for editing book format info
function validacijaFormatEdit(event) {

  $("#validateNazivFormatEdit").empty();

  let nazivFormatEdit = $("#nazivFormatEdit").val();

  if (nazivFormatEdit.length == 0) {
    $('#validateNazivFormatEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
    event.preventDefault();
  }
    if (nazivFormatEdit.length > 255) {
        $('#validateNazivFormatEdit').append('<p style="color:red;font-size:13px;">Naziv formata je predugačak! Trenutno: ' + nazivFormatEdit.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivFormatEdit() {
  $("#validateNazivFormatEdit").empty();
}

$("#sacuvajFormatEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaFormatEdit();
    return false;
  }
});

// Form validation for new book script
function validacijaPismo(event) {

  $("#validateNazivPismo").empty();

  let nazivPismo = $("#nazivPismo").val();

  if (nazivPismo.length == 0) {
    $('#validateNazivPismo').append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
    event.preventDefault();
  }
    if (nazivPismo.length > 255) {
        $('#validateNazivPismo').append('<p style="color:red;font-size:13px;">Naziv pisma je predugačak! Trenutno: ' + nazivPismo.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivPismo() {
  $("#validateNazivPismo").empty();
}

$("#sacuvajPismo").keypress(function (e) {
  if (e.which == 13) {
    validacijaPismo();
    return false;
  }
});

// Form validation for new book script
function validacijaPismoEdit(event) {

  $("#validateNazivPismoEdit").empty();

  let nazivPismoEdit = $("#nazivPismoEdit").val();

  if (nazivPismoEdit.length == 0) {
    $('#validateNazivPismoEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
    event.preventDefault();
  }
    if (nazivPismoEdit.length > 255) {
        $('#validateNazivPismoEdit').append('<p style="color:red;font-size:13px;">Naziv pisma je predugačak! Trenutno: ' + nazivPismoEdit.length + ', Maksimalno: 255</p>');
        event.preventDefault();
    }
}

function clearErrorsNazivPismoEdit() {
  $("#validateNazivPismoEdit").empty();
}

$("#sacuvajPismoEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaPismoEdit();
    return false;
  }
});

// Form validation for reseting password - student
function validacijaSifraUcenik() {

  $("#validatePwResetUcenik").empty();
  $("#validatePw2ResetUcenik").empty();

  let pwResetUcenik = $("#pwResetUcenik").val();
  let pw2ResetUcenik = $("#pw2ResetUcenik").val();

  if (pwResetUcenik.length == 0) {
    $('#validatePwResetUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti šifru!</p>');
  }

  if (pw2ResetUcenik.length == 0) {
    $('#validatePw2ResetUcenik').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
  }
}

function clearErrorsPwResetUcenik() {
  $("#validatePwResetUcenik").empty();
}

function clearErrorsPw2ResetUcenik() {
  $("#validatePw2ResetUcenik").empty();
}

$("#resetujSifruUcenik").keypress(function (e) {
  if (e.which == 13) {
    validacijaSifraUcenik();
    return false;
  }
});

// Form validation for reseting password - librarian
function validacijaSifraBibliotekar(event) {

  $("#validatePwResetBibliotekar").empty();
  $("#validatePw2ResetBibliotekar").empty();

  let pwResetBibliotekar = $("#pwResetBibliotekar").val();
  let pw2ResetBibliotekar = $("#pw2ResetBibliotekar").val();

    if (pwResetBibliotekar.length == 0) {
        $('#validatePwResetBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti šifru!</p>');
        event.preventDefault();
    }

    if (pwResetBibliotekar.length < 8){
        $('#validatePwResetBibliotekar').append('<p style="color:red;font-size:13px;">Šifra mora imati barem 8 karaktera! Trenutno: ' + pwResetBibliotekar.length + '</p>');
        event.preventDefault();
    }

    if (pw2ResetBibliotekar.length == 0) {
        $('#validatePw2ResetBibliotekar').append('<p style="color:red;font-size:13px;">Morate ponoviti šifru!</p>');
        event.preventDefault();
    }

    if (pwResetBibliotekar !== pw2ResetBibliotekar){
        $('#validatePwResetBibliotekar').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        $('#validatePw2ResetBibliotekar').append('<p style="color:red;font-size:13px;">Šifre se ne poklapaju</p>');
        event.preventDefault();
    }
}

function clearErrorsPwResetBibliotekar() {
  $("#validatePwResetBibliotekar").empty();
}

function clearErrorsPw2ResetBibliotekar() {
  $("#validatePw2ResetBibliotekar").empty();
}

$("#resetujSifruBibliotekar").keypress(function (e) {
  if (e.which == 13) {
    validacijaSifraBibliotekar();
    return false;
  }
});

function sortTableDate(row) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = $(".sortTableDate");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table[0].rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[row];
      y = rows[i + 1].getElementsByTagName("TD")[row];
      let first = $(x).text().split('.')
      let [d1, m1, y1] = [parseInt(first[0]), parseInt(first[1]), parseInt(first[2])]
      let second = $(y).text().split('.')
      let [d2, m2, y2] = [parseInt(second[0]), parseInt(second[1]), parseInt(second[2])]
      //check if the two rows should switch place:
      if (y1 > y2) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      } else if ((y1 == y2) && (m1 > m2)) {
        shouldSwitch = true;
        break;
      } else if ((y1 == y2 && m1 == m2) && d1 > d2) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}


$('#autoriMenu').on('click', function () {
  $('.autoriMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var autoriMenu = $(".autoriMenu");
  if (!autoriMenu.is(e.target) &&
    autoriMenu.has(e.target).length === 0 &&
    !$(e.target).is('.autoriMenu')) {
    autoriMenu.slideUp();
  }
});

$('#kategorijeMenu').on('click', function () {
  $('.kategorijeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var kategorijeMenu = $(".kategorijeMenu");
  if (!kategorijeMenu.is(e.target) &&
    kategorijeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.kategorijeMenu')) {
    kategorijeMenu.slideUp();
  }
});


$('.uceniciDrop-toggle').on('click', function () {
  $('.uceniciMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var uceniciMenu = $(".uceniciMenu");
  if (!uceniciMenu.is(e.target) &&
    uceniciMenu.has(e.target).length === 0 &&
    !$(e.target).is('.uceniciMenu')) {
    uceniciMenu.slideUp();
  }
});

$('.bibliotekariDrop-toggle').on('click', function () {
  $('.bibliotekariMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var bibliotekariMenu = $(".bibliotekariMenu");
  if (!bibliotekariMenu.is(e.target) &&
    bibliotekariMenu.has(e.target).length === 0 &&
    !$(e.target).is('.bibliotekariMenu')) {
    bibliotekariMenu.slideUp();
  }
});

$('#knjigeMenu').on('click', function () {
  $('.knjigeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var knjigeMenu = $(".knjigeMenu");
  if (!knjigeMenu.is(e.target) &&
    knjigeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.knjigeMenu')) {
    knjigeMenu.slideUp();
  }
});

$('#transakcijeMenu').on('click', function () {
  $('.transakcijeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var transakcijeMenu = $(".transakcijeMenu");
  if (!transakcijeMenu.is(e.target) &&
    transakcijeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.transakcijeMenu')) {
    transakcijeMenu.slideUp();
  }
});

$('.datumDrop-toggle').on('click', function () {
  $('.datumMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var datumMenu = $(".datumMenu");
  if (!datumMenu.is(e.target) &&
    datumMenu.has(e.target).length === 0 &&
    !$(e.target).is('.datumMenu')) {
    datumMenu.slideUp();
  }
});

$('.zadrzavanjeDrop-toggle').on('click', function () {
  $('.zadrzavanjeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var datumMenu = $(".zadrzavanjeMenu");
  if (!datumMenu.is(e.target) &&
    datumMenu.has(e.target).length === 0 &&
    !$(e.target).is('.zadrzavanjeMenu')) {
    datumMenu.slideUp();
  }
});

$('.vracanjeDrop-toggle').on('click', function () {
  $('.vracanjeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var vracanjeMenu = $(".vracanjeMenu");
  if (!vracanjeMenu.is(e.target) &&
    vracanjeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.vracanjeMenu')) {
    vracanjeMenu.slideUp();
  }
});

$('.statusDrop-toggle').on('click', function () {
  $('.statusMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var statusMenu = $(".statusMenu");
  if (!statusMenu.is(e.target) &&
    statusMenu.has(e.target).length === 0 &&
    !$(e.target).is('.statusMenu')) {
    statusMenu.slideUp();
  }
});

function filterFunction(id, dropdown, item) {
  var input, filter, ul, li, a, i;
  console.log(id);
  console.log(dropdown);

  input = document.getElementById(id);
  filter = input.value.toUpperCase();
  div = document.getElementById(dropdown);
  li = document.getElementsByClassName(item);
  text = div.getElementsByTagName("p");

  for (i = 0; i < text.length; i++) {
    txtValue = text[i].textContent || text[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

// Multiple select dropdown list - new book
function dropdown() {
  return {
    options: [],
    selected: [],
    show: false,
    open() {
      this.show = true
    },
    close() {
      this.show = false
    },
    isOpen() {
      return this.show === true
    },
    select(index, event) {

      if (!this.options[index].selected) {
        this.options[index].selected = true;
        this.options[index].element = event.target;
        this.selected.push(index);
      } else {
        this.selected.splice(this.selected.lastIndexOf(index), 1);
        this.options[index].selected = false
      }
    },
    remove(index, option) {
      this.options[option].selected = false;
      this.selected.splice(index, 1);
    },
    loadOptions() {
      const options = document.getElementById('kategorija').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsEdit() {
      const options = document.getElementById('kategorijaEdit').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsZanrovi() {
      const options = document.getElementById('zanr').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsZanroviEdit() {
      const options = document.getElementById('zanrEdit').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsAutori() {
      const options = document.getElementById('autori').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsAutoriEdit() {
      const options = document.getElementById('autoriEdit').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    selectedValues() {
      return this.selected.map((option) => {
        return this.options[option].value;
      })
    },
    selectedValuesKategorijaEdit() {
      const options = document.getElementById('kategorijaEdit').options;
      return options[1].innerText;
    },
    selectedValuesZanrEdit() {
      const options = document.getElementById('zanrEdit').options;
      return options[2].innerText;
    },
    selectedValuesAutoriEdit() {
      const options = document.getElementById('autoriEdit').options;
      return options[0].innerText;
    }
  }
}

function funkcijaDatumVracanja() {
  var selectedDate = Math.floor(new Date($('#datumIzdavanja').val()).getTime() / 1000);
  var numberOfDaysToAdd = $("#return_deadline").val() * 24 * 60 * 60;

  var newUnix = new Date((selectedDate + numberOfDaysToAdd) * 1000);

  document.getElementById('datumVracanja').valueAsDate = newUnix;
}

//click on one and check all checkboxes (vratiKnjigu.php)
$('.select-all').click(function () {
  if ($(this).is(':checked')) {
    $('.form-checkbox').prop('checked', true);
    $('tr').addClass('bg-gray-200');
  } else {
    $('.form-checkbox').prop('checked', false);
    $('tr').removeClass('bg-gray-200');
  }
});

$('.form-checkbox').click(function () {
  if ($(this).is(':checked')) {
    $(this).closest('tr').addClass('bg-gray-200');
  } else {
    $(this).closest('tr').removeClass('bg-gray-200');
  }
})

// Edit book multimedia - delete (hide) image
// VERY DUMB
    // $('#hide-image1').click(function () {
    //   $('.hiddenImage1').hide();
    // });
    //
    // $('#hide-image2').click(function () {
    //   $('.hiddenImage2').hide();
    // });
// end - VERY DUMB

function deletePhoto(id) {
    var child = document.getElementById('photo-' + id);
    child.parentNode.removeChild(child);
}

// Header - dropdown for create button
$('#dropdownCreate').click(function () {
  $('.dropdown-create').toggle();
});

$(document).on('mouseup', function (e) {
  var dropdownCreate = $(".dropdown-create");
  if (!dropdownCreate.is(e.target) &&
    dropdownCreate.has(e.target).length === 0 &&
    !$(e.target).is('.dropdownCreate')) {
    dropdownCreate.slideUp();
  }
});

// Header - dropdown for profile button
$('#dropdownProfile').click(function () {
  $('.dropdown-profile').toggle();
});

$(document).on('mouseup', function (e) {
  var dropdownProfile = $(".dropdown-profile");
  if (!dropdownProfile.is(e.target) &&
    dropdownProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dropdownProfile')) {
    dropdownProfile.slideUp();
  }
});

// Category - table - dropdown
$(".dotsCategory").click(function () {
  var dotsCategory = $(this);
  var dropdownCategory = dotsCategory.closest("td").find(".dropdown-category");
  dropdownCategory.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownCategory = $(".dropdown-category");
  if (!dropdownCategory.is(e.target) &&
    dropdownCategory.has(e.target).length === 0) {
    dropdownCategory.slideUp();
  }
});

// Genre - table - dropdown
$(".dotsGenre").click(function () {
  var dotsGenre = $(this);
  var dropdownGenre = dotsGenre.closest("td").find(".dropdown-genre");
  dropdownGenre.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownGenre = $(".dropdown-genre");
  if (!dropdownGenre.is(e.target) &&
    dropdownGenre.has(e.target).length === 0) {
    dropdownGenre.slideUp();
  }
});

// Publisher - table - dropdown
$(".dotsPublisher").click(function () {
  var dotsPublisher = $(this);
  var dropdownPublisher = dotsPublisher.closest("td").find(".dropdown-publisher");
  dropdownPublisher.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownPublisher = $(".dropdown-publisher");
  if (!dropdownPublisher.is(e.target) &&
    dropdownPublisher.has(e.target).length === 0) {
    dropdownPublisher.slideUp();
  }
});

// Book bind - table - dropdown
$(".dotsBookBind").click(function () {
  var dotsBookBind = $(this);
  var dropdownBookBind = dotsBookBind.closest("td").find(".dropdown-book-bind");
  dropdownBookBind.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownBookBind = $(".dropdown-book-bind");
  if (!dropdownBookBind.is(e.target) &&
    dropdownBookBind.has(e.target).length === 0) {
    dropdownBookBind.slideUp();
  }
});

// Format - table - dropdown
$(".dotsFormat").click(function () {
  var dotsFormat = $(this);
  var dropdownFormat = dotsFormat.closest("td").find(".dropdown-format");
  dropdownFormat.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownFormat = $(".dropdown-format");
  if (!dropdownFormat.is(e.target) &&
    dropdownFormat.has(e.target).length === 0) {
    dropdownFormat.slideUp();
  }
});

// Script - table - dropdown
$(".dotsScript").click(function () {
  var dotsScript = $(this);
  var dropdownScript = dotsScript.closest("td").find(".dropdown-script");
  dropdownScript.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownScript = $(".dropdown-script");
  if (!dropdownScript.is(e.target) &&
    dropdownScript.has(e.target).length === 0) {
    dropdownScript.slideUp();
  }
});

// Librarian - table - dropdown
$(".dotsLibrarian").click(function () {
  var dotsLibrarian = $(this);
  var dropdownLibrarian = dotsLibrarian.closest("td").find(".dropdown-librarian");
  dropdownLibrarian.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownLibrarian = $(".dropdown-librarian");
  if (!dropdownLibrarian.is(e.target) &&
    dropdownLibrarian.has(e.target).length === 0) {
    dropdownLibrarian.slideUp();
  }
});

// Student - table - dropdown
$(".dotsStudent").click(function () {
  var dotsStudent = $(this);
  var dropdownStudent = dotsStudent.closest("td").find(".dropdown-student");
  dropdownStudent.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudent = $(".dropdown-student");
  if (!dropdownStudent.is(e.target) &&
    dropdownStudent.has(e.target).length === 0) {
    dropdownStudent.slideUp();
  }
});

// Student - profile - dropdown
$(".dotsStudentProfile").click(function () {
  $(".dropdown-student-profile").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfile = $(".dropdown-student-profile");
  if (!dropdownStudentProfile.is(e.target) &&
    dropdownStudentProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dotsStudentProfile')) {
    dropdownStudentProfile.slideUp();
  }
});

// Student - profile - record - dropdown
$(".dotsStudentProfileEvidencija").click(function () {
  $(".dropdown-student-profile-evidencija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfileEvidencija = $(".dropdown-student-profile-evidencija");
  if (!dropdownStudentProfileEvidencija.is(e.target) &&
    dropdownStudentProfileEvidencija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsStudentProfileEvidencija')) {
    dropdownStudentProfileEvidencija.slideUp();
  }
});

// Student - profile - vraćene knjige - dropdown
$(".dotsUcenikVraceneKnjige").click(function () {
  $(".ucenik-vracene-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikVraceneKnjige = $(".ucenik-vracene-knjige");
  if (!dropdownUcenikVraceneKnjige.is(e.target) &&
    dropdownUcenikVraceneKnjige.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikVraceneKnjige')) {
    dropdownUcenikVraceneKnjige.slideUp();
  }
});

// Student - profile - knjige u prekoračenju - dropdown
$(".dotsUcenikKnjigePrekoracenje").click(function () {
  $(".ucenik-prekoracenje-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigePrekoracenje = $(".ucenik-prekoracenje-knjige");
  if (!dropdownUcenikKnjigePrekoracenje.is(e.target) &&
    dropdownUcenikKnjigePrekoracenje.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigePrekoracenje')) {
    dropdownUcenikKnjigePrekoracenje.slideUp();
  }
});

// Student - profile - aktivne knjige - dropdown
$(".dotsUcenikKnjigeAktivne").click(function () {
  $(".ucenik-aktivne-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigeAktivne = $(".ucenik-aktivne-knjige");
  if (!dropdownUcenikKnjigeAktivne.is(e.target) &&
    dropdownUcenikKnjigeAktivne.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigeAktivne')) {
    dropdownUcenikKnjigeAktivne.slideUp();
  }
});

// Student - profile - arhivirane knjige - dropdown
$(".dotsUcenikKnjigeArhivirane").click(function () {
  $(".ucenik-arhivirane-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigeArhivirane = $(".ucenik-arhivirane-knjige");
  if (!dropdownUcenikKnjigeArhivirane.is(e.target) &&
    dropdownUcenikKnjigeArhivirane.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigeArhivirane')) {
    dropdownUcenikKnjigeArhivirane.slideUp();
  }
});

// Student - profile - book record - dropdown
$(".dotsStudentProfileBookRecord").click(function () {
  var dotsStudentProfileBookRecord = $(this);
  var dropdownStudentProfileEvidencijaKnjige = dotsStudentProfileBookRecord.closest("td").find(".dropdown-student-profile-evidencija-knjige");
  dropdownStudentProfileEvidencijaKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfileEvidencijaKnjige = $(".dropdown-student-profile-evidencija-knjige");
  if (!dropdownStudentProfileEvidencijaKnjige.is(e.target) &&
    dropdownStudentProfileEvidencijaKnjige.has(e.target).length === 0) {
    dropdownStudentProfileEvidencijaKnjige.slideUp();
  }
});

// Student - profile - vracene knjige tabela - dropdown
$(".dotsUcenikVraceneKnjigeTabela").click(function () {
  var dotsUcenikVraceneKnjigeTabela = $(this);
  var dropdownUcenikVraceneKnjigeTabela = dotsUcenikVraceneKnjigeTabela.closest("td").find(".ucenik-vracene-knjige-tabela");
  dropdownUcenikVraceneKnjigeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikVraceneKnjigeTabela = $(".ucenik-vracene-knjige-tabela");
  if (!dropdownUcenikVraceneKnjigeTabela.is(e.target) &&
    dropdownUcenikVraceneKnjigeTabela.has(e.target).length === 0) {
    dropdownUcenikVraceneKnjigeTabela.slideUp();
  }
});

// Student - profile - knjige u prekoračenju tabela - dropdown
$(".dotsUcenikPrekoracenjeKnjige").click(function () {
  var dotsUcenikPrekoracenjeKnjige = $(this);
  var dropdownPrekoracenjeKnjige = dotsUcenikPrekoracenjeKnjige.closest("td").find(".ucenik-prekoracenje-knjige-tabela");
  dropdownPrekoracenjeKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownPrekoracenjeKnjige = $(".ucenik-prekoracenje-knjige-tabela");
  if (!dropdownPrekoracenjeKnjige.is(e.target) &&
    dropdownPrekoracenjeKnjige.has(e.target).length === 0) {
    dropdownPrekoracenjeKnjige.slideUp();
  }
});

// Student - profile - aktivne knjige tabela - dropdown
$(".dotsUcenikAktivneKnjige").click(function () {
  var dotsUcenikAktivneKnjige = $(this);
  var dropdownAktivneKnjige = dotsUcenikAktivneKnjige.closest("td").find(".ucenik-aktivne-knjige-tabela");
  dropdownAktivneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAktivneKnjige = $(".ucenik-aktivne-knjige-tabela");
  if (!dropdownAktivneKnjige.is(e.target) &&
    dropdownAktivneKnjige.has(e.target).length === 0) {
    dropdownAktivneKnjige.slideUp();
  }
});

// Student - profile - arhivirane knjige tabela - dropdown
$(".dotsUcenikArhiviraneKnjige").click(function () {
  var dotsUcenikArhiviraneKnjige = $(this);
  var dropdownArhiviraneKnjige = dotsUcenikArhiviraneKnjige.closest("td").find(".ucenik-arhivirane-knjige-tabela");
  dropdownArhiviraneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownArhiviraneKnjige = $(".ucenik-arhivirane-knjige-tabela");
  if (!dropdownArhiviraneKnjige.is(e.target) &&
    dropdownArhiviraneKnjige.has(e.target).length === 0) {
    dropdownArhiviraneKnjige.slideUp();
  }
});

// Librarian - profile - dropdown
$(".dotsLibrarianProfile").click(function () {
  $(".dropdown-librarian-profile").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownLibrarianProfile = $(".dropdown-librarian-profile");
  if (!dropdownLibrarianProfile.is(e.target) &&
    dropdownLibrarianProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dotsLibrarianProfile')) {
    dropdownLibrarianProfile.slideUp();
  }
});

// Izdate knjige - dropdown
$(".dotsIzdateKnjige").click(function () {
  var dotsIzdateKnjige = $(this);
  var dropdownIzdateKnjige = dotsIzdateKnjige.closest("td").find(".izdate-knjige");
  dropdownIzdateKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdateKnjige = $(".izdate-knjige");
  if (!dropdownIzdateKnjige.is(e.target) &&
    dropdownIzdateKnjige.has(e.target).length === 0) {
    dropdownIzdateKnjige.slideUp();
  }
});

// Vraćene knjige - dropdown
$(".dotsVraceneKnjige").click(function () {
  var dotsVraceneKnjige = $(this);
  var dropdownVraceneKnjige = dotsVraceneKnjige.closest("td").find(".vracene-knjige");
  dropdownVraceneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownVraceneKnjige = $(".vracene-knjige");
  if (!dropdownVraceneKnjige.is(e.target) &&
    dropdownVraceneKnjige.has(e.target).length === 0) {
    dropdownVraceneKnjige.slideUp();
  }
});

// Knjige u prekoračenju - dropdown
$(".dotsKnjigePrekoracenje").click(function () {
  var dotsKnjigePrekoracenje = $(this);
  var dropdownKnjigePrekoracenje = dotsKnjigePrekoracenje.closest("td").find(".knjige-prekoracenje");
  dropdownKnjigePrekoracenje.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigePrekoracenje = $(".knjige-prekoracenje");
  if (!dropdownKnjigePrekoracenje.is(e.target) &&
    dropdownKnjigePrekoracenje.has(e.target).length === 0) {
    dropdownKnjigePrekoracenje.slideUp();
  }
});

// Aktivne rezervacije - dropdown
$(".dotsAktivneRezervacije").click(function () {
  var dotsAktivneRezervacije = $(this);
  var dropdownAktivneRezervacije = dotsAktivneRezervacije.closest("td").find(".aktivne-rezervacije");
  dropdownAktivneRezervacije.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAktivneRezervacije = $(".aktivne-rezervacije");
  if (!dropdownAktivneRezervacije.is(e.target) &&
    dropdownAktivneRezervacije.has(e.target).length === 0) {
    dropdownAktivneRezervacije.slideUp();
  }
});

// Arhivirane rezervacije - dropdown
$(".dotsArhiviraneRezervacije").click(function () {
  var dotsArhiviraneRezervacije = $(this);
  var dropdownArhiviraneRezervacije = dotsArhiviraneRezervacije.closest("td").find(".arhivirane-rezervacije");
  dropdownArhiviraneRezervacije.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownArhiviraneRezervacije = $(".arhivirane-rezervacije");
  if (!dropdownArhiviraneRezervacije.is(e.target) &&
    dropdownArhiviraneRezervacije.has(e.target).length === 0) {
    dropdownArhiviraneRezervacije.slideUp();
  }
});

// Autori - dropdown
$(".dotsAutori").click(function () {
  var dotsAutori = $(this);
  var dropdownAutori = dotsAutori.closest("td").find(".dropdown-autori");
  dropdownAutori.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAutori = $(".dropdown-autori");
  if (!dropdownAutori.is(e.target) &&
    dropdownAutori.has(e.target).length === 0) {
    dropdownAutori.slideUp();
  }
});

// Autori - profile - dropdown
$(".dotsAutor").click(function () {
  $(".dropdown-autor").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAutor = $(".dropdown-autor");
  if (!dropdownAutor.is(e.target) &&
    dropdownAutor.has(e.target).length === 0 &&
    !$(e.target).is('.dotsAutor')) {
    dropdownAutor.slideUp();
  }
});

// Knjige - dropdown
$(".dotsKnjige").click(function () {
  var dotsKnjige = $(this);
  var dropdownKnjige = dotsKnjige.closest("td").find(".dropdown-knjige");
  dropdownKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjige = $(".dropdown-knjige");
  if (!dropdownKnjige.is(e.target) &&
    dropdownKnjige.has(e.target).length === 0) {
    dropdownKnjige.slideUp();
  }
});

// Knjiga - osnovni detalji - dropdown
$(".dotsKnjigaOsnovniDetalji").click(function () {
  $(".dropdown-knjiga-osnovni-detalji").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaOsnovniDetalji = $(".dropdown-knjiga-osnovni-detalji");
  if (!dropdownKnjigaOsnovniDetalji.is(e.target) &&
    dropdownKnjigaOsnovniDetalji.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaOsnovniDetalji')) {
    dropdownKnjigaOsnovniDetalji.slideUp();
  }
});

// Izdaj knjigu - dropdown
$(".dotsIzdajKnjigu").click(function () {
  $(".dropdown-izdaj-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdajKnjigu = $(".dropdown-izdaj-knjigu");
  if (!dropdownIzdajKnjigu.is(e.target) &&
    dropdownIzdajKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdajKnjigu')) {
    dropdownIzdajKnjigu.slideUp();
  }
});

// Izdaj knjigu error - dropdown
$(".dotsIzdajKnjiguError").click(function () {
  $(".dropdown-izdaj-knjigu-error").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdajKnjiguError = $(".dropdown-izdaj-knjigu-error");
  if (!dropdownIzdajKnjiguError.is(e.target) &&
    dropdownIzdajKnjiguError.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdajKnjiguError')) {
    dropdownIzdajKnjiguError.slideUp();
  }
});

// Vrati knjigu - dropdown
$(".dotsVratiKnjigu").click(function () {
  $(".dropdown-vrati-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownVratiKnjigu = $(".dropdown-vrati-knjigu");
  if (!dropdownVratiKnjigu.is(e.target) &&
    dropdownVratiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsVratiKnjigu')) {
    dropdownVratiKnjigu.slideUp();
  }
});

// Rezerviši knjigu - dropdown
$(".dotsRezervisiKnjigu").click(function () {
  $(".dropdown-rezervisi-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownRezervisiKnjigu = $(".dropdown-rezervisi-knjigu");
  if (!dropdownRezervisiKnjigu.is(e.target) &&
    dropdownRezervisiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsRezervisiKnjigu')) {
    dropdownRezervisiKnjigu.slideUp();
  }
});

// Otpiši knjigu - dropdown
$(".dotsOtpisiKnjigu").click(function () {
  $(".dropdown-otpisi-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownOtpisiKnjigu = $(".dropdown-otpisi-knjigu");
  if (!dropdownOtpisiKnjigu.is(e.target) &&
    dropdownOtpisiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsOtpisiKnjigu')) {
    dropdownOtpisiKnjigu.slideUp();
  }
});

// Knjiga - specifikacija - dropdown
$(".dotsKnjigaSpecifikacija").click(function () {
  $(".dropdown-knjiga-specifikacija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaSpecifikacija = $(".dropdown-knjiga-specifikacija");
  if (!dropdownKnjigaSpecifikacija.is(e.target) &&
    dropdownKnjigaSpecifikacija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaSpecifikacija')) {
    dropdownKnjigaSpecifikacija.slideUp();
  }
});

// Knjiga - multimedija - dropdown
$(".dotsKnjigaMultimedija").click(function () {
  $(".dropdown-knjiga-multimedija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaMultimedija = $(".dropdown-knjiga-multimedija");
  if (!dropdownKnjigaMultimedija.is(e.target) &&
    dropdownKnjigaMultimedija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaMultimedija')) {
    dropdownKnjigaMultimedija.slideUp();
  }
});

// Iznajmljivanje - izdate - dropdown
$(".dotsIznajmljivanjeIzdate").click(function () {
  $(".dropdown-iznajmljivanje-izdate").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeIzdate = $(".dropdown-iznajmljivanje-izdate");
  if (!dropdownIznajmljivanjeIzdate.is(e.target) &&
    dropdownIznajmljivanjeIzdate.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeIzdate')) {
    dropdownIznajmljivanjeIzdate.slideUp();
  }
});

// Iznajmljivanje - vraćne - dropdown
$(".dotsIznajmljivanjeVracene").click(function () {
  $(".dropdown-iznajmljivanje-vracene").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeVracene = $(".dropdown-iznajmljivanje-vracene");
  if (!dropdownIznajmljivanjeVracene.is(e.target) &&
    dropdownIznajmljivanjeVracene.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeVracene')) {
    dropdownIznajmljivanjeVracene.slideUp();
  }
});

// Iznajmljivanje - prekoračenje - dropdown
$(".dotsIznajmljivanjePrekoracenje").click(function () {
  $(".dropdown-iznajmljivanje-prekoracenje").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjePrekoracenje = $(".dropdown-iznajmljivanje-prekoracenje");
  if (!dropdownIznajmljivanjePrekoracenje.is(e.target) &&
    dropdownIznajmljivanjePrekoracenje.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjePrekoracenje')) {
    dropdownIznajmljivanjePrekoracenje.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - dropdown
$(".dotsIznajmljivanjeAktivneRezervacije").click(function () {
  $(".dropdown-iznajmljivanje-aktivne-rezervacije").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeAktivneRezervacije = $(".dropdown-iznajmljivanje-aktivne-rezervacije");
  if (!dropdownIznajmljivanjeAktivneRezervacije.is(e.target) &&
    dropdownIznajmljivanjeAktivneRezervacije.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeAktivneRezervacije')) {
    dropdownIznajmljivanjeAktivneRezervacije.slideUp();
  }
});

// Iznajmljivanje - arhivirane rezervacije - dropdown
$(".dotsIznajmljivanjeArhiviraneRezervacije").click(function () {
  $(".dropdown-iznajmljivanje-arhivirane-rezervacije").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeArhiviraneRezervacije = $(".dropdown-iznajmljivanje-arhivirane-rezervacije");
  if (!dropdownIznajmljivanjeArhiviraneRezervacije.is(e.target) &&
    dropdownIznajmljivanjeArhiviraneRezervacije.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeArhiviraneRezervacije')) {
    dropdownIznajmljivanjeArhiviraneRezervacije.slideUp();
  }
});

// Izdavanje - detalji - dropdown
$(".dotsIzdavanjeDetalji").click(function () {
  $(".dropdown-izdavanje-detalji").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdavanjeDetalji = $(".dropdown-izdavanje-detalji");
  if (!dropdownIzdavanjeDetalji.is(e.target) &&
    dropdownIzdavanjeDetalji.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdavanjeDetalji')) {
    dropdownIzdavanjeDetalji.slideUp();
  }
});

// Iznajmljivanje - izdate knjige - tabela - dropdown
$(".dotsIznajmljivanjeIzdateKnjige").click(function () {
  var dotsIznajmljivanjeIzdateKnjige = $(this);
  var dropdownIznajmljivanjeIzdateKnjige = dotsIznajmljivanjeIzdateKnjige.closest("td").find(".iznajmljivanje-izdate-knjige");
  dropdownIznajmljivanjeIzdateKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeIzdateKnjige = $(".iznajmljivanje-izdate-knjige");
  if (!dropdownIznajmljivanjeIzdateKnjige.is(e.target) &&
    dropdownIznajmljivanjeIzdateKnjige.has(e.target).length === 0) {
    dropdownIznajmljivanjeIzdateKnjige.slideUp();
  }
});

// Iznajmljivanje - vraćene knjige - tabela - dropdown
$(".dotsIznajmljivanjeVraceneKnjige").click(function () {
  var dotsIznajmljivanjeVraceneKnjige = $(this);
  var dropdownIznajmljivanjeVraceneKnjige = dotsIznajmljivanjeVraceneKnjige.closest("td").find(".iznajmljivanje-vracene-knjige");
  dropdownIznajmljivanjeVraceneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeVraceneKnjige = $(".iznajmljivanje-vracene-knjige");
  if (!dropdownIznajmljivanjeVraceneKnjige.is(e.target) &&
    dropdownIznajmljivanjeVraceneKnjige.has(e.target).length === 0) {
    dropdownIznajmljivanjeVraceneKnjige.slideUp();
  }
});

// Iznajmljivanje - knjige u prekoračenju - tabela - dropdown
$(".dotsIznajmljivanjeKnjigePrekoracenje").click(function () {
  var dotsIznajmljivanjeKnjigePrekoracenje = $(this);
  var dropdownIznajmljivanjeKnjigePrekoracenje = dotsIznajmljivanjeKnjigePrekoracenje.closest("td").find(".iznajmljivanje-knjige-prekoracenje");
  dropdownIznajmljivanjeKnjigePrekoracenje.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeKnjigePrekoracenje = $(".iznajmljivanje-knjige-prekoracenje");
  if (!dropdownIznajmljivanjeKnjigePrekoracenje.is(e.target) &&
    dropdownIznajmljivanjeKnjigePrekoracenje.has(e.target).length === 0) {
    dropdownIznajmljivanjeKnjigePrekoracenje.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - tabela - dropdown
$(".dotsIznajmljivanjeAktivneRezervacijeTabela").click(function () {
  var dotsIznajmljivanjeAktivneRezervacijeTabela = $(this);
  var dropdownIznajmljivanjeAktivneRezervacijeTabela = dotsIznajmljivanjeAktivneRezervacijeTabela.closest("td").find(".iznajmljivanje-aktivne-rezervacije");
  dropdownIznajmljivanjeAktivneRezervacijeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeAktivneRezervacijeTabela = $(".iznajmljivanje-aktivne-rezervacije");
  if (!dropdownIznajmljivanjeAktivneRezervacijeTabela.is(e.target) &&
    dropdownIznajmljivanjeAktivneRezervacijeTabela.has(e.target).length === 0) {
    dropdownIznajmljivanjeAktivneRezervacijeTabela.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - tabela - dropdown
$(".dotsIznajmljivanjeArhiviraneRezervacijeTabela").click(function () {
  var dotsIznajmljivanjeArhiviraneRezervacijeTabela = $(this);
  var dropdownIznajmljivanjeArhiviraneRezervacijeTabela = dotsIznajmljivanjeArhiviraneRezervacijeTabela.closest("td").find(".iznajmljivanje-arhivirane-rezervacije");
  dropdownIznajmljivanjeArhiviraneRezervacijeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeArhiviraneRezervacijeTabela = $(".iznajmljivanje-arhivirane-rezervacije");
  if (!dropdownIznajmljivanjeArhiviraneRezervacijeTabela.is(e.target) &&
    dropdownIznajmljivanjeArhiviraneRezervacijeTabela.has(e.target).length === 0) {
    dropdownIznajmljivanjeArhiviraneRezervacijeTabela.slideUp();
  }
});

//click on one and check all checkboxes(evidencijaKnjiga.php)
$('.checkAll').click(function () {
  if ($(this).is(':checked')) {
      $('.checkOthers').each(function () {
          this.checked = true
      })
    $('thead').addClass('bg-gray-200');
    $('tr').slice(0, -1).addClass('bg-gray-200');
  } else {
      $('.checkOthers').each(function () {
          this.checked = false
      })
    $('thead').removeClass('bg-gray-200');
    $('tbody').removeClass('bg-gray-200');
    $('tr').removeClass('bg-gray-200');
  }
});

//    if you click on tr checkbox will be selected

$('tr').click(function (e) {
    if (e.target.tagName != "TD") {
        return;
    }
    $(this).find('td label input').each(function () {
        this.click()
    })
})

$('.checkOthers').click(function () {
    var checked = $('#myTableBody').find(':checked').length;
    var checbox = $('#myTableBody').find(':checkbox').length;

    if (checbox != checked) {
        $('.checkAll').each(function () {
            this.checked = false;
            $('thead').removeAttr('class');
            $('#head').removeAttr('class');
        })
    } else if (checbox == checked) {
        $('.checkAll').each(function () {
            this.checked = true;
            $('thead').addClass('bg-gray-200');
            $('tr').slice(0, -1).addClass('bg-gray-200');
        })
    }

    if (checked == 1) {
        $('.one').each(function () {
            this.hidden = false;
        })
        $('.multiple').each(function () {
            this.hidden = true;
        })
    } else if (checked >= 2) {
        $('.one').each(function () {
            this.hidden = true;
        });
        $('.multiple').each(function () {
            this.hidden = false;
        })
    } else {
        $('.checkAll').each(function () {
            this.checked = false;
        })
        $('.one').each(function () {
            this.hidden = true;
        });
        $('.multiple').each(function () {
            this.hidden = true;
        })
    }
})

$('.checkOthers').click(function () {
    var checked = $('#myTableBody').find(':checked');
    const path = window.location.pathname + '/';
    if (checked.length == 1) {
        checked.each(function () {
            console.log(path);
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const href = this.getAttribute('data-href');
            if (/\/settings\/.*/gm.test(path)) {
                document.getElementById("edit").href = path + id + "/edit";
                document.getElementById("deleteOne").setAttribute('data-id', id);
                document.getElementById("deleteOne").setAttribute('data-name', name);
            } else {
                if (path == '/aktivne-rezervacije/' || /\/students\/.*\/aktivne-rezervacije/i.test(path)){
                    const details = this.getAttribute('data-details');
                    document.getElementById('detalji').href = details;
                    document.getElementById('izdaj').href = href;
                    const otkazi = document.getElementById('otkaziRez');
                    const bookName = this.getAttribute('data-book-name');
                    const studentName = this.getAttribute('data-student-name');
                    const action = this.getAttribute('data-action');

                    otkazi.setAttribute('data-action', '/books/' + id + '/vrati');
                    otkazi.setAttribute('data-book-name', bookName);
                    otkazi.setAttribute('data-student-name', studentName);
                    otkazi.setAttribute('data-action', action);
                } else {
                    if (path === '/izdate/' || path === '/vracene/'|| path === '/otpisane/' || path === '/prekoracene/' || /\/students\/.*\/izdate/i.test(path) || /\/students\/.*\/vracene/i.test(path) || /\/students\/.*\/otpisane/i.test(path) || /\/students\/.*\/prekoracene/i.test(path)) {
                        const bookId = this.getAttribute('data-book-id');
                        const bookName = this.getAttribute('data-book-name');
                        const studentName = this.getAttribute('data-student-name');

                        document.getElementById("detalji").href = '/books/' + bookId + '/evidencija/' + id + '/show';

                        if (path === '/izdate/' || path === '/prekoracene/' || /\/students\/.*\/izdate/i.test(path) || /\/students\/.*\/prekoracene/i.test(path)) {
                            const vrati = document.getElementById('vrati');
                            vrati.setAttribute('data-action', '/books/' + bookId + '/vrati');
                            vrati.setAttribute('data-name', name);
                            vrati.setAttribute('data-id', id);
                            vrati.setAttribute('data-book-name', bookName);
                            vrati.setAttribute('data-student-name', studentName);

                            const otpisi = document.getElementById('otpisi');
                            otpisi.setAttribute('data-action', '/books/' + bookId + '/otpisi');
                            otpisi.setAttribute('data-name', name);
                            otpisi.setAttribute('data-id', id);
                            otpisi.setAttribute('data-book-name', bookName);
                            otpisi.setAttribute('data-student-name', studentName);
                        }
                    } else if (path === '/arhivirane-rezervacije/' || /\/students\/.*\/arhivirane-rezervacije/i.test(path)){

                    } else {
                        document.getElementById("detalji").href = path + id;
                        document.getElementById("edit").href = path + id + "/edit";

                        if (path === '/books/') {
                            document.getElementById("otpisi").href = "/books/" + id + "/otpisi";
                            document.getElementById("izdaj").href = "/books/" + id + "/izdaj";
                            document.getElementById("vrati").href = "/books/" + id + "/vrati";
                            document.getElementById("rezervisi").href = "/books/" + id + "/rezervisi";
                        }

                        document.getElementById("deleteOne").setAttribute('data-id', id);
                        document.getElementById("deleteOne").setAttribute('data-name', name);
                    }
                }
            }

        })
    } else if (checked.length >= 2){
        if (path === '/izdate/' || path === '/vracene/'|| path === '/otpisane/' || path === '/prekoracene/' || /\/students\/.*\/izdate/i.test(path) || /\/students\/.*\/vracene/i.test(path) || /\/students\/.*\/otpisane/i.test(path) || /\/students\/.*\/prekoracene/i.test(path) || /\/students\/.*\/aktivne-rezervacije/i.test(path) || path == '/aktivne-rezervacije/' || path === '/arhivirane-rezervacije/' || /\/students\/.*\/arhivirane-rezervacije/i.test(path)) {

        } else {
            var ids = [];
            var names = [];
            checked.each(function () {
                ids.push(this.getAttribute('data-id'));
                names.push(this.getAttribute('data-name'));
            })
            // console.log(ids);
            document.getElementById("deleteMany").setAttribute('data-id', ids);
            document.getElementById("deleteMany").setAttribute('data-name', names);
        }
    } else {
        // document.getElementById("ids").value = '';
        if (path === '/izdate/' || path === '/vracene/'|| path === '/otpisane/' || path === '/prekoracene/' || /\/students\/.*\/izdate/i.test(path) || /\/students\/.*\/vracene/i.test(path) || /\/students\/.*\/otpisane/i.test(path) || /\/students\/.*\/prekoracene/i.test(path) || /\/students\/.*\/aktivne-rezervacije/i.test(path) || path == '/aktivne-rezervacije/' || path === '/arhivirane-rezervacije/' || /\/students\/.*\/arhivirane-rezervacije/i.test(path)) {

        } else {
            document.getElementById("deleteOne").removeAttribute('data-id');
        }
    }
})

$('.deleteOne').click(function () {
    var id = this.getAttribute('data-id');
    var name = this.getAttribute('data-name')
    var action = this.getAttribute('data-action');
    // console.log(action);
    // console.log(id, name);
    var Modal = document.getElementById('deleteOneModal');
    var modalTitle = Modal.querySelector('.modalLabel')
    var modalForm = Modal.querySelector('form');

    modalTitle.innerHTML = '<b>' + name + '</b>'
    if(!action){
        modalForm.action = window.location.href + '/' + id;
        return
    }
    modalForm.action = action;
})

$('#deleteMany').click(function () {
    var ids = this.getAttribute('data-id').split(',');
    var names = this.getAttribute('data-name').split(',');
    // console.log(ids, names);
    var Modal = document.getElementById('deleteManyModal');
    var modalTitle = Modal.querySelector('.modalLabel')
    var collapse = Modal.querySelector('.showMorebtn');
    modalTitle.innerHTML = '';
    var modalFormInput = Modal.querySelector('#ids');

    collapse.innerHTML = '<b>(' + ids.length + ')<i class="fa fa-caret-down" style="padding-left: 3px"></i></b>'
    names.forEach(function (a) {
        modalTitle.innerHTML += '<li><b>' + a + '</b></li>';
    })
    modalFormInput.value = ids;
})

$('.vrati').click(function () {
    var id = this.getAttribute('data-id');
    var name = this.getAttribute('data-name');
    var bookId = this.getAttribute('data-book-id');
    var bookName = this.getAttribute('data-book-name');
    var studentName = this.getAttribute('data-student-name');
    var action = this.getAttribute('data-action');

    var Modal = document.getElementById('returnBookModal');
    var modalTitle = Modal.querySelector('.modalLabel')
    var form = Modal.querySelector('form');
    var modalFormInput = Modal.querySelector('.ids');

    form.action = action;

    modalTitle.innerHTML = '<b>' + bookName + '</b> za ucenika <b>' + studentName + '</b>';

    modalFormInput.value = id;
})

$('.otkaziRez').click(function () {
    // var id = this.getAttribute('data-id');
    var name = this.getAttribute('data-name');
    var bookId = this.getAttribute('data-book-id');
    var bookName = this.getAttribute('data-book-name');
    var studentName = this.getAttribute('data-student-name');
    var action = this.getAttribute('data-action');

    var Modal = document.getElementById('otkaziRezModal');
    var modalTitle = Modal.querySelector('.modalLabel')
    var form = Modal.querySelector('form');
    // var modalFormInput = Modal.querySelector('.ids');

    form.action = action;

    modalTitle.innerHTML = '<b>' + bookName + '</b> za ucenika <b>' + studentName + '</b>';

    // modalFormInput.value = id;
})

$('.otpisi').click(function () {
    var id = this.getAttribute('data-id');
    var name = this.getAttribute('data-name');
    var bookId = this.getAttribute('data-book-id');
    var bookName = this.getAttribute('data-book-name');
    var studentName = this.getAttribute('data-student-name');
    var action = this.getAttribute('data-action');
    console.log(action);

    var Modal = document.getElementById('writeoffBookModal');
    var modalTitle = Modal.querySelector('.modalLabel')
    var form = Modal.querySelector('form');
    var modalFormInput = Modal.querySelector('.ids');

    form.action = action;

    modalTitle.innerHTML = '<b>' + bookName + '</b> za ucenika <b>' + studentName + '</b>';

    modalFormInput.value = id;
})

$('#deleteOneModal').on('hidden.bs.modal', function () {
    this.querySelector('form').action = '';
    this.querySelector('form input').value = '';
})
$('#deleteManyModal').on('hidden.bs.modal', function () {
    // this.querySelector('form').action = '';
    this.querySelector('.ids').value = '';
})
$('#returnBookModal').on('hidden.bs.modal', function () {
    this.querySelector('form').action = '';
    this.querySelector('.ids').value = '';
})

$('.makeSure').on('keyup', function () {
    const prompt = this.value;
    const form = $(this).closest('form')[0];
    const button = form.querySelector('.sure');

    if (prompt == 'DA') {
        button.removeAttribute('disabled');
    } else {
        button.setAttribute('disabled', 'true');
    }
})

function checkMakeSure(event, button) {
    const form = $(button).closest('form')[0];
    const prompt = form.querySelector('input').value;
    if (prompt != 'DA') {
        event.preventDefault();
        console.log('I am not that dumb :)');
        alert('I am not that dumb :)');
    }
}


(function ($) {
    "use strict";
    function centerModal() {
        $(this).css('display', 'block');
        var $dialog  = $(this).find(".modal-dialog"),
            offset       = ($(window).height() - $dialog.height()) / 2,
            bottomMargin = parseInt($dialog.css('marginBottom'), 10);

        // Make sure you don't hide the top part of the modal w/ a negative margin if it's longer than the screen height, and keep the margin equal to the bottom margin of the modal
        if(offset < bottomMargin) offset = bottomMargin;
        $dialog.css("margin-top", offset);
    }

    $(document).on('show.bs.modal', '.modal', centerModal);
    $(document).on('shown.bs.collapse', '.modal', centerModal);
    // $(document).on('hidden.bs.collapse', '.modal', centerModal);
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });
}(jQuery));

function flashMsg(msg, type) {
    Swal.fire({
        "title": msg,
        // "text":msg,
        "timer":5000,
        "width":"40rem",
        "padding":"1.2rem",
        "showConfirmButton":false,
        "showCloseButton":true,
        "timerProgressBar":false,
        "customClass":{"container":null,"popup":null,"header":null,"title":null,"closeButton":null,"icon":null,"image":null,"content":null,"input":null,"actions":null,"confirmButton":null,"cancelButton":null,"footer":null},
        "toast":true,
        "icon":type,
        "position":"top-end"});
}

function autofill() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('ucenik');
    console.log(id);
    if ($('#ucenikIzdavanje').find("option[value='" + id + "']").length) {
        $('#ucenikIzdavanje').val(id).trigger('change');
    }
}

//    add scroll class to every section cuz of small displays are unable to scroll down
// $('section').addClass('scroll');

// when we hover over search icon search field would be unhidden
$('#searchIcon').on('click', function () {
    if ($('#searchForm').is(':hidden')) {
        var knjige = document.getElementById('knjige');
        knjige.textContent = '';

        var ucenici = document.getElementById('ucenici');
        ucenici.textContent = '';

        var bibliotekari = document.getElementById('bibliotekari');
        bibliotekari.textContent = '';

        $('#searchForm').fadeIn();
    } else {
        $('#resultWrapper').fadeOut();
        $('#info').fadeOut();
        $('#searchBar').val('');
        $('#searchFilter').fadeOut();
        $('#searchFilter input:checkbox:not(:checked)').each(function () {
            this.click();
        });
    }
})

// when we click outsite header or search wrapper we will hide everything
window.addEventListener('click', function(e){
    if (document.getElementById('searchWrapper').contains(e.target) || document.getElementById('siteHeader').contains(e.target)){
        // Clicked in box
    } else{
        // Clicked outside the box
        $('#searchForm').fadeOut();
        $('#resultWrapper').fadeOut();
        $('#info').fadeOut();
        $('#searchFilter').fadeOut();
        $('#searchBar').val('');
    }
});
// $('header').on('mouseleave', function () {
//     $('#searchBar').fadeOut();
//     $('#resultWrapper').fadeOut();
// })

$('#searchBar').on('input focusin', function () {
    $('#searchFilter').fadeOut();

    var info = document.getElementById('info');
    var resultWrapper = document.getElementById('resultWrapper');

    var knjige = document.getElementById('knjige');
    knjige.textContent = '';

    var ucenici = document.getElementById('ucenici');
    ucenici.textContent = '';

    var bibliotekari = document.getElementById('bibliotekari');
    bibliotekari.textContent = '';


    var search = $('#searchBar').val();
    $('#resultWrapper').attr('hidden', 'true');
    // if input length is lower than 3 chars ww will display notification
    if (search.length < 3) {
        $(resultWrapper).fadeOut(1);
        $(info).fadeIn();
        info.querySelector('ul').innerHTML = `<a href="#" style="font-size: 20px"><li style="padding-left: 15px">Morate unijeti barem 3 karaktera</li></a>`;
    } else {
        $(info).fadeOut(3);
        $(resultWrapper).fadeIn(2);
        $(resultWrapper).addClass('blur');
        var form = $('#searchForm');
        setTimeout(function () {
            // send request to /search
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: "/search",
                data: form.serialize(),
                success:function(data){
                    setTimeout(function () {

                        knjige.innerText = '';
                        ucenici.innerText = '';
                        bibliotekari.innerText = '';

                        if (data.books.length < 1) {
                            knjige.innerHTML += `<a href="#" style="font-size: 20px"><li style="padding-left: 15px">Nema pronađenih rezultata</li></a>`;
                        } else {
                            $.each(data.books, function (k, v) {
                                knjige.innerHTML += `<a href="/books/${v.id}" style="font-size: 20px"><li style="padding-left: 15px">${v.title}</li></a>`;
                            })
                        }

                        if (data.students.length < 1) {
                            ucenici.innerHTML += `<a href="#" style="font-size: 20px"><li style="padding-left: 15px">Nema pronađenih rezultata</li></a>`;
                        } else {
                            $.each(data.students, function (k, v) {
                                ucenici.innerHTML += `<a href="/students/${v.username}" style="font-size: 20px"><li style="padding-left: 15px">${v.name} ${v.surname}</li></a>`;
                            })
                        }

                        if (data.librarians.length < 1) {
                            bibliotekari.innerHTML += `<a href="#" style="font-size: 20px"><li style="padding-left: 15px">Nema pronađenih rezultata</li></a>`;
                        } else {
                            $.each(data.librarians, function (k, v) {
                                bibliotekari.innerHTML += `<a href="/librarians/${v.username}" style="font-size: 20px"><li style="padding-left: 15px">${v.name} ${v.surname}</li></a>`;
                            })
                        }

                        // $(resultWrapper).fadeIn(2);
                        $(resultWrapper).removeClass('blur');
                    },300)
                },
            });
        }, 300);
    }
})

$('#filterDropdown').on('click', function () {
    var filter = document.getElementById('searchFilter');

    if ($(filter).is(':hidden')) {
        $(filter).fadeIn();
    } else {
        $(filter).fadeOut();
    }
})

$('#knjigeFilter').click(function () {
    if (this.checked == false) {
        $('#knjigaWrapper').fadeOut();
    } else {
        $('#knjigaWrapper').fadeIn();
    }
});

$('#ucenikFilter').click(function () {
    if (this.checked == false) {
        $('#ucenikWrapper').fadeOut();
    } else {
        $('#ucenikWrapper').fadeIn();
    }
});

$('#bibliotekarFilter').click(function () {
    if (this.checked == false) {
        $('#bibliotekarWrapper').fadeOut();
    } else {
        $('#bibliotekarWrapper').fadeIn();
    }
});

$('#activityForm').on('input submit', function (event) {
    event.preventDefault();
    if (!(event.target.type === 'checkbox' || event.target.type === 'date' || event.target.id === 'activityForm')) {
        return
    }
    var form = $('#activityForm');
    var data = form.serialize();

    window.history.pushState('', null, '?' + data)

    var izdavanjaDiv = document.getElementById('izdavanja');
    var rezervacijeDiv = document.getElementById('rezervacije');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // todo promijeni ovo u ajax

    $.getJSON('/activity', data, function (data) {
            $(izdavanjaDiv).addClass('blur1');
            $(rezervacijeDiv).addClass('blur1');
        setTimeout(function () {
            var borrows = data.borrows;
            var reservations = data.reservations;

            if (borrows.length > 0) {

                izdavanjaDiv.innerText = '';
                $.each(borrows, function (k, v) {
                    izdavanjaDiv.innerHTML += izdavanjeActivity(v);
                })

            } else {
                izdavanjaDiv.innerHTML = noActivity();
            }

            if (reservations.length > 0) {

                rezervacijeDiv.innerText = '';
                $.each(reservations, function (k, v) {
                    rezervacijeDiv.innerHTML += rezervacijeActivity(v);
                })

            } else {
                rezervacijeDiv.innerHTML = noActivity();
            }

            $(izdavanjaDiv).removeClass('blur1');
            $(rezervacijeDiv).removeClass('blur1');
        }, 200);
    })
})

function noActivity() {
    return `
                <div class="flex flex-row mb-[30px]">
                   <div class="ml-[15px] mt-[5px] flex flex-col">
                       <div class="text-gray-500 mb-[5px]" style="font-size: 30px">
                           <h2 class="uppercase">
                               NEMA AKTIVNOSTI
                           </h2>
                       </div>
                   </div>
               </div>
            `;
}

function izdavanjeActivity(borrow) {
    var date = new Date(Date.parse(borrow.datum));
    let inside;
    switch (borrow.bookStatus_id) {
        case 1:
            inside = `
                izdao/la na osnovu rezervacije knjigu <span class="font-bold"><a
                            href="/books/${borrow.book_id}">${borrow.book.title}</a></span>
                učeniku
            `;
            break
        case 2:
            inside = `
                izdao/la knjigu <span class="font-bold"><a
                            href="/books/${borrow.book_id}">${borrow.book.title}</a></span>
                učeniku
            `;
            break
        case 3:case 4:
            inside = `
                preuzeo/la knjigu <span class="font-bold"><a
                            href="/books/${borrow.book_id}">${borrow.book.title}</a></span> od
                učenika
            `;
            break
        case 5:
            inside = `
                otpisao/la knjigu <span class="font-bold"><a
                            href="/books/${borrow.book_id}">${borrow.book.title}</a></span>
                učenika
            `;
            break
    }

    let librarian_photo;
    let librarian_name;

    switch (borrow.bookStatus_id) {
        case 1:
        case 2:
            librarian_photo = `
                <div class="flex w-[60px] h-[60px] items-center">
                    <img class="rounded-full" src="${borrow.librarian.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+borrow.librarian.photoPath}" alt="">
                </div>
            `;

            librarian_name = `
                <a href="/librarians/${borrow.librarian.username}"
                   class="text-[#2196f3] hover:text-blue-600">
                    ${borrow.librarian.name} ${borrow.librarian.surname}
                </a>
            `;

            break
        case 3:
        case 4:
        case 5:
            librarian_photo = `
                <div class="flex w-[60px] h-[60px] items-center">
                    <img class="rounded-full" src="${borrow.librarian1.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+borrow.librarian1.photoPath}" alt="">
                </div>
            `;

            librarian_name = `
                <a href="/librarians/${borrow.librarian1.username}"
                   class="text-[#2196f3] hover:text-blue-600">
                    ${borrow.librarian1.name} ${borrow.librarian1.surname}
                </a>
            `;

            break
    }


    var div = `
        <div class="flex flex-row mb-[30px]">
            ${librarian_photo}
            <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            <b>Knjiga ${borrow.name}</b>
                            <span class="inline lowercase">
                                - ${diffForHumans(borrow.datum)}
                            </span>
                        </p>
                    </div>
                <div class="">
                    <p>
                        ${librarian_name}
                        je
                        ${inside}
                        <a href="/students/${borrow.student.username}"
                           class="text-[#2196f3] hover:text-blue-600">
                            ${borrow.student.name} ${borrow.student.surname}
                        </a>
                        dana <span
                                class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                        <a href="/books/${borrow.book_id}/evidencija/${borrow.id}/show"
                           class="text-[#2196f3] hover:text-blue-600">
                            pogledaj detaljnije >>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    `;
    return div;
}

function rezervacijeActivity(res) {
    var date = new Date(Date.parse(res.datum));

    let div;

    switch (res.status_id) {
        case 1:
            div = `<div class="flex flex-row mb-[30px]">
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="${res.librarian.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+res.librarian.photoPath}" alt="">
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            Otvorena : ${res.status}
                            <span class="inline lowercase">
                                - ${diffForHumans(res.datum)}
                            </span>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <a href="/librarians/${res.librarian.username}"
                               class="text-[#2196f3] hover:text-blue-600">
                               ${res.librarian.name} ${res.librarian.surname}
                            </a>
                            je prihvatio/la zahtjev za rezervaciju knjige
                            <span class="font-bold"><a href="/books/${res.book_id}">${res.book.title}</a></span>
                            učenika
                            <a href="/students/${res.student.username}"
                               class="text-[#2196f3] hover:text-blue-600">
                                ${res.student.name} ${res.student.surname}
                            </a>
                            dana
                            <span class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                            <a href="/books/${res.book_id}/rezervacija/${res.id}/show" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
            </div>`
            break
        case 2:
            div = `<div class="flex flex-row mb-[30px]">
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="${res.student.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+res.student.photoPath}" alt="">
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            ${res.cReason} : ${res.status}
                            <span class="inline lowercase">
                                - ${diffForHumans(res.datum)}
                            </span>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <a href="/students/${res.student.username}"
                               class="text-[#2196f3] hover:text-blue-600">
                                ${res.student.name} ${res.student.surname}
                            </a>
                            je poslao/la zahtjev za rezervaciju knjige
                            <span class="font-bold"><a href="/books/${res.book_id}">${res.book.title}</a></span>
                            dana
                            <span class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                            <a href="/books/${res.book_id}/rezervacija/${res.id}/show" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
            </div>`
            break
        case 3:
            div = `<div class="flex flex-row mb-[30px]">
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="${res.librarian1.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+res.librarian1.photoPath}" alt="">
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            Otvorena : ${res.status}
                            <span class="inline lowercase">
                                - ${diffForHumans(res.datum)}
                            </span>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <a href="/librarians/${res.librarian1.username}"
                               class="text-[#2196f3] hover:text-blue-600">
                               ${res.librarian1.name} ${res.librarian1.surname}
                            </a>
                            je odbio/la zahtjev za rezervaciju knjige
                            <span class="font-bold"><a href="/books/${res.book_id}">${res.book.title}</a></span>
                            učenika
                            <a href="/students/${res.student.username}"
                               class="text-[#2196f3] hover:text-blue-600">
                                ${res.student.name} ${res.student.surname}
                            </a>
                            dana
                            <span class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                            <a href="/books/${res.book_id}/rezervacija/${res.id}/show" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
            </div>`
            break
        case 4:
            if (res.closingReason_id == 1) {
                div = `<div class="flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="${res.librarian.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+res.librarian1.photoPath}" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Zatvorena : ${res.cReason}
                                <span class="inline lowercase">
                                    - ${diffForHumans(res.datum)}
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                Rezervacija knjige
                                <span class="font-bold"><a href="/books/${res.book_id}">${res.book.title}</a></span>
                                za
                                učenika
                                <a href="/students/${res.student.username}"
                                   class="text-[#2196f3] hover:text-blue-600">
                                    ${res.student.name} ${res.student.surname}
                                </a>
                                je istekla
                                dana
                                <span class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                                <a href="/books/${res.book_id}/rezervacija/${res.id}/show" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>`
            } else {
                div = `<div class="flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="${res.librarian1.photoPath == null ? '/img/profile.jpg' : '/storage/images/users/'+res.librarian1.photoPath}" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Zatvorena : ${res.cReason}
                                <span class="inline lowercase">
                                    - ${diffForHumans(res.datum)}
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="/librarians/${res.librarian1.username}"
                                   class="text-[#2196f3] hover:text-blue-600">
                                   ${res.librarian1.name} ${res.librarian1.surname}
                                </a>
                                je zatvorio/la rezervaciju knjige
                                <span class="font-bold"><a href="/books/${res.book_id}">${res.book.title}</a></span>
                                učenika
                                <a href="/students/${res.student.username}"
                                   class="text-[#2196f3] hover:text-blue-600">
                                    ${res.student.name} ${res.student.surname}
                                </a>
                                dana
                                <span class="font-bold">${("0" + date.getDate()).slice(-2)}.${("0" + (date.getMonth() + 1)).slice(-2)}.${date.getFullYear()}</span>
                                <a href="/books/${res.book_id}/rezervacija/${res.id}/show" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>`
            }
            break
    }
    return div;
}

function diffForHumans(date1) {
    date1 = dayjs(date1).format('YYYY-MM-DD');

    var diff =  dayjs(date1).from(dayjs().format('YYYY-MM-DD'));

    diff = diff.replace('pre', 'prije').replace('prije nekoliko sekundi', 'danas').replace('meseca', 'mjeseca').replace('meseci', 'mjeseci');
    return diff;
}

$('.activity-reset').on('click', function () {
    var button = this;
    var id = button.getAttribute('data-dropdown');
    var dropdown = document.getElementById(id);
    var checked = $('input:checkbox:checked', dropdown);
    checked.each(function () {
        this.click();
    })
});

$('#uceniciDropdown').on('change', function () {
    var dropdown = document.getElementById('uceniciDropdown');
    var button = document.getElementById('uceniciButton');
    var ucenik = "Sve";

    if ($("input:checkbox:checked", dropdown).length > 0) {
        ucenik = $("input:checkbox:checked", dropdown).length;
    }

    button.innerText = '';

    var span = $(`
        ${ucenik === "Sve" ? "<span class='float-left'>" : "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>"}
            Učenici: ${ucenik}
            <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);
})

$('#bibliotekariDropdown').on('change', function () {
    var dropdown = document.getElementById('bibliotekariDropdown');
    var button = document.getElementById('bibliotekariButton');
    var bibliotekar = "Sve";

    if ($("input:checkbox:checked", dropdown).length > 0) {
        bibliotekar = $("input:checkbox:checked", dropdown).length;
    }

    button.innerText = '';

    var span = $(`
        ${bibliotekar === "Sve" ? "<span class='float-left'>" : "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>"}
            Bibliotekari: ${bibliotekar}
            <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);
})

$('#knjigeDropdown').on('change', function () {
    var dropdown = document.getElementById('knjigeDropdown')
    var button = document.getElementById('knjigeMenu');
    var knjiga = "Sve";

    if ($("input:checkbox:checked", dropdown).length === 1){
        knjiga = $("input:checkbox:checked", dropdown)[0].getAttribute('data-book-name');
    } else if ($("input:checkbox:checked", dropdown).length > 1) {
        knjiga = $("input:checkbox:checked", dropdown).length;
    }

    button.innerText = '';

    var span = $(`
        ${knjiga === "Sve" ? "<span class='float-left'>" : "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>"}
            Knjiga: ${knjiga}
            <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);
})

$('#transakcijeDropdown').on('change', function () {
    var dropdown = document.getElementById('transakcijeDropdown');
    var button = document.getElementById('transakcijeMenu');
    var transakcija = "Sve";

    if ($("input:checkbox:checked", dropdown).length > 0) {
        transakcija = $("input:checkbox:checked", dropdown).length;
    }

    button.innerText = '';

    var span = $(`
        ${transakcija === "Sve" ? "<span class='float-left'>" : "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>"}
            Transakcije: ${transakcija}
            <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);
})

$('#datumDropdown').on('change', function () {
    var dropdown = document.getElementById('datumDropdown');
    var button = document.getElementById('datumButton');
    var datum = "Sve";
    var haveVal = 0;

    $("input", dropdown).each(function (k, v) {
        if ($(v).val()) {
            haveVal++;
            datum = v.getAttribute('name');
        }
    });
    if(haveVal > 1) {
        datum = haveVal;
    }
    // if ($("input:checkbox:checked", dropdown).length > 0) {
    //     datum = $("input:checkbox:checked", dropdown).length;
    // }

    button.innerText = '';

    var span = $(`
        ${datum === "Sve" ? "<span class='float-left'>" : "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>"}
            Datum: ${datum}
            <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);
})

$('.activity-reset-datum').on('click', function () {
    var button = document.getElementById('datumButton');

    var input = $('#datumDropdown input');
    $.each(input, function (k, v) {
        $(v).val('');
    })
    $('#activityForm').submit();

    button.innerText = '';

    var span = $(`
            <span class='float-left'>
                Datum: Sve
                <i class="px-[7px] fas fa-angle-down"></i>
            </span>
    `);

    $(button).append(span);

})
