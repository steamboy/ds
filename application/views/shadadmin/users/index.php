<div class="title">        
    <h2>User</h2>
</div>

<div class="box">
    <h3>User List</h3>
    <table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <!-- <th scope="col">Password</th> -->
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
		<th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user)
    {
    ?>
    <tr class="odd">
        <td><?php echo $user->id;?></td>
        <td><?php echo $user->email;?></td>
        <td><?php echo $user->username;?></td>
        <!-- <td><?php echo $user->password;?></td> -->
        <td><?php echo $user->firstname;?></td>
        <td><?php echo $user->lastname;?></td>
        <td><a href="<?php echo url::base();?>index.php/users/edit/<?php echo $user->id;?>">Edit</a> | <a class="remove_layout" id="<?php echo $user->id;?>">Remove</a></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
    <br />
</div>