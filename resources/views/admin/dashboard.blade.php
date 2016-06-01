@extends('layouts.admin')
@section('content')
    <section id="content">
        <div class="container">
          <div id="card-stats">
            <div class="row">
              <div class="col s12 m6 l3">
                <div class="card">
                  <a href="" data-target="modal1" class="modal-trigger regEmp">
                  <div class="card-content  green white-text">
                    <p class="card-stats-title"><i class="material-icons">group</i> Registered Employee</p>
                    <h4 class="card-stats-number registeredEmp"></h4>
                    </p>
                  </div>
                  <div class="card-action  green darken-2"></div>
                  </a>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card">
                  <div class="card-content pink lighten-1 white-text">
                    <p class="card-stats-title"><i class="material-icons">group_add</i> Pending Accounts</p>
                    <h4 class="card-stats-number pendingEmp"></h4>
                    </p>
                  </div>
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
                      <div>
                        <span class="chart-title white-text">Revenue</span>
                        <div class="chart-revenue cyan darken-2 white-text">
                          <p class="chart-revenue-total">$4,500.85</p>
                          <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                        </div>
                        <div class="switch chart-revenue-switch right">
                          <label class="cyan-text text-lighten-5">
                            Month
                            <input type="checkbox">
                            <span class="lever"></span> Year
                          </label>
                        </div>
                      </div>
                      <div class="trending-line-chart-wrapper">
                        <canvas style="width: 820px; height: 191px;" width="820" id="trending-line-chart" height="191"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="card-content">
                    <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                    <div class="col s12 m3 l3">
                      <div id="doughnut-chart-wrapper">
                        <canvas style="width: 185px; height: 123px;" width="185" id="doughnut-chart" height="123"></canvas>
                        <div class="doughnut-chart-status">4500
                          <p class="ultra-small center-align">Sold</p>
                        </div>
                      </div>
                    </div>
                    <div class="col s12 m2 l2">
                      <ul class="doughnut-chart-legend">
                        <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                        <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                        <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                      </ul>
                    </div>
                    <div class="col s12 m5 l6">
                      <div class="trending-bar-chart-wrapper">
                        <canvas style="width: 393px; height: 117px;" width="393" id="trending-bar-chart" height="117"></canvas>
                      </div>
                    </div>
                  </div>
                  <div style="display: none; transform: translateY(0px);" class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                    <table class="responsive-table">
                      <thead>
                        <tr>
                          <th data-field="id">ID</th>
                          <th data-field="month">Month</th>
                          <th data-field="item-sold">Item Sold</th>
                          <th data-field="item-price">Item Price</th>
                          <th data-field="total-profit">Total Profit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>January</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>February</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>March</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>April</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>May</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>June</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>July</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>August</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>Septmber</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>Octomber</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td>November</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>December</td>
                          <td>122</td>
                          <td>100</td>
                          <td>$122,00.00</td>
                        </tr>
                      </tbody>
                    </table>
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
                  <div class="card-content  teal darken-2">
                    <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                    <div class="line-chart-wrapper">
                      <p class="margin white-text">Revenue by country</p>
                      <canvas style="width: 391px; height: 148px;" width="391" id="line-chart" height="148"></canvas>
                    </div>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Revenue by country <i class="mdi-navigation-close right"></i></span>
                    <table class="responsive-table">
                      <thead>
                        <tr>
                          <th data-field="country-name">Country Name</th>
                          <th data-field="item-sold">Item Sold</th>
                          <th data-field="total-profit">Total Profit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>USA</td>
                          <td>65</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>UK</td>
                          <td>76</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>Canada</td>
                          <td>65</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>Brazil</td>
                          <td>76</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>India</td>
                          <td>65</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>France</td>
                          <td>76</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>Austrelia</td>
                          <td>65</td>
                          <td>$452.55</td>
                        </tr>
                        <tr>
                          <td>Russia</td>
                          <td>76</td>
                          <td>$452.55</td>
                        </tr>
                      </tbody>
                    </table>
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
                <tbody class="displayRecord" data-next-page="{{ $employee->nextPageUrl() }}">

                  @foreach($employee as $employees)

                  <tr>
                    <td>{{ $employees->fullname }}</td>
                    <td class="regDate">{{ $employees->created_at }}</script></td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
              <div class="spinnerLoader">
                <img src="images/loading.gif" alt="">
              </div>
            </div>
          </div>
        </div>
    </section>
<script src="js/dashboard.js"></script>
<script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
<script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
<script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>
@stop