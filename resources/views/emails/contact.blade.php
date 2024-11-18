<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    {{-- <p><strong>Phone:</strong> {{ $phone }}</p> --}}
    <p><strong>Subject:</strong> {{ $data['title'] }}</p>
    <p><strong>Message:</strong> {{ $data['body']}}</p>

</body>
</html>

