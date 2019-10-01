@extends('layouts.backend.master')


@section('title', 'Survey Statistik')
@section('menu', 'Survey Statistik')
@section('submenu', 'Home')
@section('submenu2', '')

@section('content')
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-white header-elements-inline">
          <h5 class="card-title"><i class="icon-graph"></i> Survey Statistik</h5>
          <div class="header-elements">
            <form action="#">
              <select id="select_survey" class="form-control wmin-200">
                <option value="#" disabled selected>Pilih Survey</option>
                @foreach ($pages as $pg)
                  <option value="{{ $pg->id }}">{{ $pg->nama }}</option>  
                @endforeach
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card-deck col-md-12" id="container_filter">
      
    </div>

    {{-- <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-white header-elements-inline">
          <h5 class="card-title">Apakah Anda Tinggal Di Jabodetabek</h5>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <canvas id="myChart1" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
    </div> --}}


@stop

@section('script')
  <script>
    $('#select_survey').on('change', function() {
      var id = $(this).val();
      // console.log(id);

      $.ajax({url: "/api/surveystat/" + id})
        .done(function(res) {
          $('#container_filter').empty();
          console.log(res.data)
          var dataResult = res.data;

          dataResult.forEach((element, index) => {
            var marginTop = (index > 1) ? 'mt-3' : '';
            var el = `
            <div class="col-md-6 ${marginTop}">
              <div class="card">
                <div class="card-header bg-white header-elements-inline">
                  <h5 class="card-title">${element.pertanyaan}</h5>
                </div>
                <div class="card-body">
                  <div class="col-md-12">
                    test
                  </div>
                </div>
              </div>
            </div>`;
            $('#container_filter').append(el)
          });
        })
    })

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['<21', '21 Tahun - 25 Tahun', '26 Tahun - 30 Tahun', '31 Tahun - 35 Tahun', '36 Tahun - 40 Tahun', 'Orange'],
        datasets: [{
          // label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });

    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var myChart1 = new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Ya', 'Tidak'],
        datasets: [{
          // label: '# of Votes',
          data: [15, 8],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
    
  </script>
@stop
