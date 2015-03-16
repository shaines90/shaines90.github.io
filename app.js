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

    $scope.submitForm = function() {
      console.log("posting data....");
      formData = $scope.form;
      console.log(formData);
    };
  });