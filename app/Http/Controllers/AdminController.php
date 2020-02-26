<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\Event;
use App\Invitation;
use App\Models\Service;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class AdminController extends Controller
{
    public function index() {
      //get the revenue
      $revenue=Payment::sum('amount');
      //get the users
      $users=User::count();
      //get invitations
      $invitations=Invitation::count();
//events
     $events=Event::count();
//get all the users
  $all_users=User::latest()->get();

  //chart
  $chart_options = [
      'chart_title' => 'Payments by months',
      'report_type' => 'group_by_date',
      'model' => 'App\Payment',
      'group_by_field' => 'created_at',
      'group_by_period' => 'month',
      'aggregate_function' => 'sum',
      'aggregate_field' => 'amount',
      'chart_type' => 'bar',
  ];
$chart1 = new LaravelChart($chart_options);
  //chart
  $chart_options2 = [
      'chart_title' => 'Invitation by months',
      'report_type' => 'group_by_date',
      'model' => 'App\Invitation',
      'group_by_field' => 'created_at',
      'group_by_period' => 'month',

      'chart_type' => 'bar',
  ];



  $chart2 = new LaravelChart($chart_options2);

      return view("admin.index",compact('revenue','users','invitations','events','all_users','chart1','chart2'));
    }

    public function payments() {
      $payments=Payment::latest()->get();
      return view("admin.payments",compact('payments'));
    }

    public function services() {
      $services=Service::latest()->get();
      return view("admin.services",compact('services'));
    }

    public function events() {
      $events=Event::with('user')->latest()->get();

      return view("admin.events",compact('events'));
    }

    public function reports() {



      return view("admin.reports");
    }

    public function invitations() {
      $invitations=Invitation::first()->with('event','inviter','service')->get();
      return view("admin.invitations",compact('invitations'));
    }


}
