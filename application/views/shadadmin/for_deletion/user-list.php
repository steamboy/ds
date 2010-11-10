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
                <th scope="col">Password</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $users)
            {
            ?>
            <tr class="odd">
                <td><?php echo $users->id;?></td>
                <td><?php echo $users->email;?></td>
                <td><?php echo $users->username;?></td>
                <td><?php echo $users->password;?></td>
                <td><?php echo $users->firstname;?></td>
                <td><?php echo $users->lastname;?></td>
                <td><a href="<?php echo url::base();?>index.php/layout/form/update/<?php echo $users->id;?>">Edit</a> | <a class="remove_layout" id="<?php echo $users->id;?>">Remove</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
            <br />
        </div>