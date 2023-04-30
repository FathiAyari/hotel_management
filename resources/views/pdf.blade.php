
<!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<head>

    <style>
        img{
            height: 100px;
            width: 100px;
        }
        tr {
            padding: 0 45px;


        }
        th {
            text-align: left;
            padding: 20px 20px;

        }
        .title{
            padding: 10 10px;
        }
    </style>
</head>


<body>

<table border="1">
    <tr>
        <th><img  src="https://thumbs.dreamstime.com/z/check-out-icon-hotel-collection-design-concept-simple-element-vector-illustration-white-background-130330188.jpg" alt=""></th>
        <th> {{$data->user->etab}}</th>
        <th > le {{$date }} </br> </th>

    </tr>
    <tr>
        <th>Responsable:{{ Auth::user()->name }}</th>
        <th > Fiche checkout </th>
        <th >{{$data->user->adress}}</th>

    </tr>



</table>
<br>
<table class="123">

    <tr>
        <th class= "title"colspan="3"> Donneés de client </th>
       <th></th>



    </tr>


    <tr>
        <th colspan="3"> Nom et prénom :</th>

            <th> {{$data->client->name}} {{$data->client->lastname}} </th>




    </tr>
    <tr>
        <th colspan="3"> GSM :</th>

            <th> {{$data->client->gsm}} </th>




    </tr>
    <tr>
        <th colspan="3"> Piece d'identité :</th>

            <th> {{$data->client->document_number}} </th>




    </tr>
    <tr>
        <th colspan="3"> Nationalité :</th>

            <th> {{$data->client->nationality}} </th>




    </tr>
    <tr>
        <th colspan="3"> Chambre :</th>

            <th> {{$data->room->number}} </th>




    </tr>
    <tr>
        <th colspan="3"> Date de debut :</th>

            <th> {{$data->start}} </th>




    </tr>
    <tr>
        <th colspan="3"> Date de fin :</th>

            <th> {{$data->end}} </th>
    </tr>
    <tr>
        <th colspan="3"> Extra :</th>

            <th> {{$data->extra}} DT</th>
    </tr>
    <tr>
        <th colspan="3"> Consommation :</th>

            <th> {{$data->consumption}} DT</th>
    </tr>
    <tr>
        <th colspan="3"> Total :</th>

            <th> {{$ttc}} DT</th>
    </tr>








</table>













<table class="123">

    <tr>

        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Signature </th>



    </tr>
    <tr>

        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>........................... </th>



    </tr>









</table>


</body>


</html>
