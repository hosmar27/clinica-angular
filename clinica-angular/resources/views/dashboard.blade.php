<!doctype html>
<html lang="en" ng-app="clinicDash">
<head>
  <meta charset="utf-8">
  <title>Dashboard - Clinic</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.3/angular.min.js"></script>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:0;background:#f4f7fb;color:#222}
    .layout{display:flex;min-height:100vh}
    .sidebar{width:220px;background:#fff;border-right:1px solid #e6e6e6;padding:20px}
    .sidebar h3{margin-top:0}
    .nav-item{display:block;padding:8px 10px;border-radius:6px;color:#0b74da;text-decoration:none;margin-bottom:6px}
    .nav-item.active{background:#0b74da;color:#fff}
    .content{flex:1;padding:20px}
    table{width:100%;border-collapse:collapse}
    table th,table td{padding:8px;border:1px solid #e6e6e6}
  </style>
</head>
<body ng-controller="DashboardCtrl as vm">
  <div class="layout">
    <aside class="sidebar">
      <h3>Clinic</h3>
      <a href="#" class="nav-item" ng-class="{active: vm.view=='patients'}" ng-click="vm.show('patients')">Patients</a>
      <a href="#" class="nav-item" ng-class="{active: vm.view=='dentists'}" ng-click="vm.show('dentists')">Dentists</a>
      <a href="#" class="nav-item" ng-class="{active: vm.view=='appointments'}" ng-click="vm.show('appointments')">Appointments</a>
    </aside>

    <main class="content">
      <h2 ng-if="vm.view=='patients'">Patients</h2>
      <h2 ng-if="vm.view=='dentists'">Dentists</h2>
      <h2 ng-if="vm.view=='appointments'">Appointments</h2>

      <div ng-if="vm.error" style="background:#ffecec;color:#b00020;padding:8px;border-radius:6px;margin-bottom:12px">@{{ vm.error }}</div>

      <div ng-if="vm.view=='patients'">
        <table>
          <thead><tr><th>ID</th><th>Name</th><th>CPF</th><th>Phone</th><th>Actions</th></tr></thead>
          <tbody>
            <tr ng-repeat="p in vm.patients">
              <td>@{{ p.id }}</td>
              <td>@{{ p.name }}</td>
              <td>@{{ p.cpf }}</td>
              <td>@{{ p.phone }}</td>
              <td><a ng-href="/patients/edit/@{{ p.id }}">Edit</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div ng-if="vm.view=='dentists'">
        <table>
          <thead><tr><th>ID</th><th>Name</th><th>CPF</th><th>Phone</th><th>CIP</th><th>Actions</th></tr></thead>
          <tbody>
            <tr ng-repeat="d in vm.dentists">
              <td>@{{ d.id }}</td>
              <td>@{{ d.name }}</td>
              <td>@{{ d.cpf }}</td>
              <td>@{{ d.phone }}</td>
              <td>@{{ d.cip }}</td>
              <td><a ng-href="/dentists/edit/@{{ d.id }}">Edit</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div ng-if="vm.view=='appointments'">
        <table>
          <thead><tr><th>ID</th><th>Patient</th><th>Dentist</th><th>Date Time</th><th>Status</th><th>Actions</th></tr></thead>
          <tbody>
            <tr ng-repeat="a in vm.appointments">
              <td>@{{ a.id }}</td>
              <td>@{{ a.patient_id }}</td>
              <td>@{{ a.dentist_id }}</td>
              <td>@{{ a.date_time }}</td>
              <td>@{{ a.status }}</td>
              <td><a ng-href="/appointments/edit/@{{ a.id }}">Edit</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    angular.module('clinicDash', [])
    .controller('DashboardCtrl', ['$http', function($http){
      var vm = this;
      vm.view = 'patients';
      vm.patients = [];
      vm.dentists = [];
      vm.appointments = [];
      vm.error = null;

      vm.show = function(name){ vm.view = name; vm.error = null; vm.load(name); };

      vm.load = function(name){
        if (name === 'patients'){
          $http.get('/patients', { headers:{ Accept: 'application/json' }}).then(function(res){ vm.patients = res.data; }, function(err){ vm.error='Failed to load patients.'; });
        } else if (name === 'dentists'){
          $http.get('/dentists', { headers:{ Accept: 'application/json' }}).then(function(res){ vm.dentists = res.data; }, function(err){ vm.error='Failed to load dentists.'; });
        } else if (name === 'appointments'){
          $http.get('/api/appointments').then(function(res){ vm.appointments = res.data; }, function(err){ vm.error='Failed to load appointments.'; });
        }
      };

      vm.load(vm.view);
    }]);
  </script>
</body>
</html>
