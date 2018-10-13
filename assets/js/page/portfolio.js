
//JQuery No Conflict
var $ = jQuery.noConflict();

$(window).load(function () { $("#preloader").fadeOut(1000); })

$(document).ready(function () {
  $(".portlet-container.startStepone").show();
  $(".portlet-container.startStepfive").hide();

  var items = $('.portfolio-items');
  items.isotope({
    sortBy: 'number',
    sortAscending: true
  });

  //Datetimepicker of Date of Birth
  $('.date').datetimepicker({
    language: 'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  //var for form resume
  var formResume = document.getElementById("formResume");
  //step one
  var rsmName = document.getElementById("rsmName");
  var rsmReligion = document.getElementById("rsmReligion");

  //exit 
  var exitProfile = document.getElementById("exit_profile");
  exitProfile.onclick = function () { resetResume() };

  var uexitProfile = document.getElementById("uexit_profile");
  var uexitContact = document.getElementById("uexit_contact");
  var uexitJob = document.getElementById("uexit_job");
  var uexitEducation = document.getElementById("uexit_education");
  var uexitProject = document.getElementById("uexit_project");
  uexitProfile.onclick = function () { resetUpdate() };
  uexitContact.onclick = function () { resetUpdate() };
  uexitJob.onclick = function () { resetUpdate() };
  uexitEducation.onclick = function () { resetUpdate() };
  uexitProject.onclick = function () { resetUpdate() };

  //Action  to Function
  //step one
  rsmName.onkeyup = function () { validateStepone() };
  rsmReligion.onchange = function () { validateStepone() };

  //Function
  function validateStepone() {
    console.log("rsmName.value ", rsmName.value);
    console.log("rsmReligion.value ", rsmReligion.value);

    if (rsmName.value != "" && rsmReligion.value != "") {
      $('.endStepone').prop('disabled', false);
      formResume.onsubmit = function () { return true };
      msgOne.innerHTML = '<div class="alert alert-success"> Good </div>';
    }
    else {
      $('.endStepone').prop('disabled', true);
      formResume.onsubmit = function () { return false };
      msgOne.innerHTML = '<div class="alert alert-warning"> Fill the blank </div>';
    }
  }

  function resetResume() {
    formResume.reset();
    $(".portlet-container.startStepfive").hide();
    $(".portlet-container.startStepone").show();
    $(".modal").modal('hide');
    msgOne.innerHTML = null;
    msgFive.innerHTML = null;
  }

  function resetUpdate() {
    formUpdateResume.reset();
    $(".portlet-container.ustartStepfive").hide();
    $(".portlet-container.ustartStepone").show();
    $(".modal").modal('hide');
    umsgOne.innerHTML = null;
    umsgFive.innerHTML = null;
  }
});

$(function () {
  /* Form Resume */
  $(".endStepone").click(function () {
    $(".portlet-container.startStepone").hide();
    $(".portlet-container.startStepfive").show();
    return false;
  });
  $("#exit_two").click(function () {
    $(".portlet-container.startStepfive").hide();
    $('.endStepone').prop('disabled', false);
    $(".portlet-container.startStepone").show();
    return false;
  });
 
  /* Dragable */
  $("#createResume").draggable({
    handle: ".modal-header"
  });

  /* Filter Ascending - Descending */
  $(".asc").click(function () {
    $('.portfolio-items').isotope({
      sortBy: 'number',
      sortAscending: true
    });
  });

  $(".desc").click(function () {
    $('.portfolio-items').isotope({
      sortBy: 'number',
      sortAscending: false
    });
  });

  $(".alph").click(function () {
    $('.portfolio-items').isotope({
      sortAscending: {
        name: true
      }
    });
  });
});
