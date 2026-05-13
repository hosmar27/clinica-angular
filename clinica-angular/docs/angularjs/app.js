angular.module('clinicApp', [])
.controller('AppointmentsCtrl', ['$http', function($http) {
  var vm = this;
  vm.appointments = [];
  vm.form = { patient_id: null, dentist_id: null, date_time: '' };

  vm.load = function() {
    vm.error = null;
    $http.get('/api/appointments').then(function(res) {
      vm.appointments = res.data;
    }, function(err) {
      console.error(err);
      vm.error = 'Failed to load appointments.';
    });
  };

  vm.create = function() {
    var payload = angular.copy(vm.form);
    $http.post('/api/appointments', payload).then(function() {
      vm.form = { patient_id: null, dentist_id: null, date_time: '' };
      vm.load();
    }, function(err) {
      console.error(err);
      vm.error = 'Failed to create appointment.';
    });
  };

  vm.remove = function(id) {
    if (!confirm('Delete appointment #' + id + '?')) return;
    vm.error = null;
    $http.delete('/api/appointments/' + id).then(function() {
      vm.load();
    }, function(err) {
      console.error(err);
      vm.error = 'Failed to delete appointment.';
    });
  };

  vm.load();
}]);
