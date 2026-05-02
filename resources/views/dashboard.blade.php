<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Info Table</title>
<style>
  .user-info {
      background-color: #f9f9f9;
      padding: 20px 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 350px;
      font-family: Arial, sans-serif;
      color: #333;
      text-align: center;
  }

  table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
  }

  th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
  }

  th {
      background-color: #007bff;
      color: white;
  }

.user-info form {
    margin-top: 10px;
    text-align: center;
}

.user-info button {
    padding: 6px 12px;
    background-color: #dc3545;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: auto;
    min-width: 100px;
}

.user-info button:hover {
    background-color: #a71d2a;
}

</style>
</head>
<body>

<div class="user-info">
  <table>
    <tr>
      <th>Name</th>
      <td>{{$user->name}}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{$user->email}}</td>
    </tr>
  </table>

  <form method="POST" action="{{ url('/logout') }}">
      @csrf
      <button type="submit">Logout</button>
  </form>
</div>

</body>
</html>
