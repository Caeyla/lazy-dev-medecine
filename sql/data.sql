$user1 = new User();
$user1->name = 'emp1';
$user1->password = bcrypt('emp1');
$user1->status = 5;
$user1->save();
