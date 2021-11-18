<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>{{__('export.date')}}</th>
        <th>{{__('export.revenue')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$result[0]}}</td>
            <td>{{$result[1]}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">{{__('export.total')}}</td>
        <td>{{$revenue}}</td>
    </tr>
    </tbody>
</table>
