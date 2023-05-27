@extends('layouts.app')
@section('content')
<!-- payment.blade.php -->

<form action="{{url('/payment')}}" method="post">
    @csrf
	<input type="hidden" name="_method" value="get">
    <div class="form-group">
        <label for="amount">Montant:</label>
        <input type="number" name="amount" id="amount" class="form-control" required    readonly value="{{$nb}}">
    </div>

    <div class="form-group">
        <label for="currency">Devise:</label>
        <select name="currency" id="currency" class="form-control" required>
            <option value="USD">MAD</option>
           
            <!-- Ajoutez d'autres options de devise selon vos besoins -->
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <button   href="https://www.paypal.com/myaccount"class="btn btn-primary">Payer avec PayPal</button>
</form>

	@endsection
	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqd
