@extends('layouts.admin')
@section('content')
<script>
  $('.sideNav li:nth-child(1)').addClass('active').siblings().removeClass('active');
</script>
    <section id="content">
        <div class="container">
          <div id="card-stats">
            <div class="row">
              <div class="col s12 m6 l3">
                <div class="card">
                  <a href="" data-target="modal1" class="modal-trigger showEmp" id="regEmployee">
                    <div class="card-content  green white-text">
                      <p class="card-stats-title"><i class="material-icons">group</i> Registered Employee</p>
                      <h4 class="card-stats-number registeredEmp">{{ $regemployee }}</h4>
                      </p>
                    </div>
                  <div class="card-action  green darken-2"></div>
                  </a>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card">
                  <a href="" data-target="modal1" class="modal-trigger showEmp" id="pendEmployee">
                    <div class="card-content pink lighten-1 white-text">
                      <p class="card-stats-title"><i class="material-icons">group_add</i> Pending Accounts</p>
                      <h4 class="card-stats-number pendingEmp">{{ $pendemployee }}</h4>
                      </p>
                    </div>
                  </a>
                  <div class="card-action  pink darken-2">
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card">
                  <div class="card-content blue-grey white-text">
                    <p class="card-stats-title"><i class="material-icons">timeline</i> Attendance Today</p>
                    <h4 class="card-stats-number">1</h4>
                    </p>
                  </div>
                  <div class="card-action blue-grey darken-2">
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card">
                  <div class="card-content purple white-text">
                    <p class="card-stats-title"><i class="material-icons">accessibility</i> Online Employee</p>
                    <h4 class="card-stats-number">1</h4>
                    </p>
                  </div>
                  <div class="card-action purple darken-2">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="chart-dashboard">
            <div class="row">
              <div class="col s12 m8 l8">
                <div class="card">
                  <div class="card-move-up waves-effect waves-block waves-light">
                    <div class="move-up cyan darken-1">
                      <div class="trending-line-chart-wrapper">
                        <canvas style="width: 820px; height: 191px;" width="820" id="trending-line-chart" height="191"></canvas>
                        <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                      </div>
                    </div>

                  </div>
                  <div style="display: none; transform: translateY(0px);" class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Registered Employee<i class="mdi-navigation-close right"></i></span>
                    <table class="responsive-table">
                      <thead>
                        <tr>
                          <th data-field="month">Total Registered</th>
                          <th data-field="item-sold">Month</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>January</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>February</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>March</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>April</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>May</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>June</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card donught-wrap">
                  <div class="col s12 m3 l7">
                    <div id="doughnut-chart-wrapper">
                      <canvas style="width: 185px; height: 123px;" width="185" id="doughnut-chart" height="123"></canvas>
                      <div class="doughnut-chart-status">
                        <p class="ultra-small center-align">Total <span>18</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m2 l5">
                    <ul class="doughnut-chart-legend">
                      <li><strong>Legend</strong></li>
                      <li class="mobile ultra-small"><span class="legend-color"></span>Registered Employee</li>
                      <li class="kitchen ultra-small"><span class="legend-color"></span> Pending Employee</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col s12 m4 l4">
                <div class="card">
                  <div class="card-move-up teal waves-effect waves-block waves-light">
                    <div class="move-up">
                      <p class="margin white-text">Browser Stats</p>
                      <canvas style="width: 419px; height: 159px;" width="419" id="trending-radar-chart" height="159"></canvas>
                    </div>
                  </div>
                  <div class="col s12 m5 l6">
                   <div class="card-content">
                     <div class="trending-bar-chart-wrapper">
                       <canvas style="width: 393px; height: 117px;" width="393" id="trending-bar-chart" height="117"></canvas>
                     </div>
                   </div>
                    
                  </div>
                </div>
              </div>
            </div>
      <!-- Modal Structure -->
          <div id="modal1" class="modal regEmployee">
            <div class="modal-content">
              <h4>Registered Employee</h4>
              <table class="striped">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Date Registered</th>
                  </tr>
                </thead>
                <tbody class="displayRecord" data-next-page="">

             <!--      <tr>
                    <td></td>
                    <td class="regDate"></script></td>
                  </tr> -->

                </tbody>
              </table>
              <div class="spinnerLoaderDash">
                <img src="images/loading.gif" alt="">
              </div>
            </div>
          </div>
       
    </section>
<script src="js/dashboard.js"></script>
<script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
<script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>
@stop