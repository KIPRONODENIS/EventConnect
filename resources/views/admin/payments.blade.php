@extends('layouts.admin')
@section('content')
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-users"></i>All Payments</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="paymentTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Payed By</th>
                        <th>Amount</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Payed By</th>
                      <th>Amount</th>
                      <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
@foreach($payments as $payment)
                    <tr>
                      <td>{{$payment->id}}</td>
                      <td>{{$payment->code}}</td>
                      <td>{{$payment->user->name}}</td>
                      <td>{{$payment->amount}}</td>
                      <td>
                        <a class="btn btn-success" href="#" >view</a>
                        <a class="btn btn-primary" href="#" >Edit</a>
                        <a class="btn btn-danger" href="#" >Delete</a>
                      </td>
                    </tr>
@endforeach

                    <!-- <tr>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>56</td>
                        <td>2012/06/01</td>
                        <td>$115,000</td>
                    </tr>
                    <tr>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013/02/01</td>
                        <td>$75,650</td>
                    </tr>
                    <tr>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011/12/06</td>
                        <td>$145,600</td>
                    </tr>
                    <tr>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011/03/21</td>
                        <td>$356,250</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>$103,500</td>
                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
