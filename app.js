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