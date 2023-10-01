<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dependency Dropdown</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Dependency Dropdown</div>
                    <div class="card-body">
                        <form action="">
                            @csrf
                            <label for="">Select Country</label>
                            <select name="" id="country_id" class="form-control my-3">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <label for="">Select State</label>
                            <select  id="state_id" class="form-control my-2"></select>
                            <label for="">Select City</label>
                            <select  id="city_id" class="form-control my-2"></select>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
        $(document).ready(function(){
            $('#country_id').on('change', function(){
                var country_id = $(this).val();
                $('#state_id').html(' ');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/fetchstate') }}",
                        data: { country_id:country_id },
                        dataType: "json",
                        success: function (response) {

                            $('#state_id').html('<option value="">Select state</option>');
                            response.forEach((val, i) => {
                                $('#state_id').append(`<option value="${val.id}">${val.name}</option>`);
                            });
                            $('#city_id').html('<option value="">Select city</option>');
                        }
                    });
                 });

            $('#state_id').on('change', function(){
                var state_id = $(this).val();
                $('#city_id').html(' ');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/fetchcity') }}",
                        data: { state_id:state_id },
                        dataType: "json",
                        success: function (response) {

                            $('#city_id').html('<option value="">Select City</option>');
                            response.forEach( (val, i) => {
                                $('#city_id').append(`<option value="${val.id}">${val.name}</option>`);
                            });
                        }
                    });
                  });
              });
</script>

</body>
</html>
