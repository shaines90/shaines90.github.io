$(document).ready(function(){
  $('#ftos').click(function(){
    if($(this).attr('checked') == false){
       $('#fsubmit').attr("disabled","disabled");
    } else {
      $('#fsubmit').removeAttr('disabled');
    }
  });
});

var checkboxes = document.getElementsByTagName('termsConditions');

for (var i=0; i<checkboxes.length; i++)  {
  if (checkboxes[i].type == 'checkbox')   {
    checkboxes[i].checked = false;
  }
}

$(document).ready(function() {
  $('#ftos').change(function(){ // when checkbox check status changed
    if($(this).is(':checked'))                // if it is checked
      $('#fsubmit').removeAttr('disabled'); // remove the disabled attribute from submit button
  });
});

var app = angular.module("talk", [])
  app.controller("FormController", function($scope, $http) {
    var formData = {
      firstName: "default",
      lastName: "default",
      email: "default",
      phoneNumber: "default",
      degree: "default",
      options: "default",
      termsConditions: "default",
    };

    $scope.save = function() {
      formData= $scope.myForm;
    };

    $scope.save = function() {
      formData= $scope.contactForm;
    };

    $scope.submitForm = function() {
      console.log("posting data....");
      formData = $scope.form;
      console.log(formData);
    };

  app.controller("ContactController", function($scope, $http) {
    var contactData = {
      fullName: "default",
      contactEmail: "default",
      contactContent: "default",
    };

    $scope.save = function() {
      contactData = $scope.contactForm;
    };

    $scope.submitContactForm = function() {
      console.log("posting data....");
      contactData = $scope.form;
      console.log(contactData);
    };

});