<!doctype>
<html>
<head></head>
<body>
<div>
    <p>Hi, {{ $partner->name }}</p>
    <p>You have been successfully registered as a partner with :</p>

    <p>Company Name: {{ $publisher->company_name }}</p>
    <p>Managed By: {{ $publisher->name }}</p>
    <p>Share: {{ $partner->share }}</p>% share
    <p>Wallet Address: {{ $partner->wallet_address }}</p>
</div>
</body>
</html>