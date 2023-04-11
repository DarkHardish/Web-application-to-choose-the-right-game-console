<h1>Answers</h1>
<table>
    <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer['question'] }}</td>
                <td>{{ $answer['answer'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>