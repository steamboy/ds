        <div class="title">
            <h2>User</h2>
        </div>

        <div class="box">
            <h3><?php echo ucfirst($form_type);?> User</h3>
            <div class="box">
            
            <form method="post" action="#">
            
            <ul>
                <li>
                    <label>Email</label>
                    <div><input name="email" id="email" class="required" value="" type="text"></div>
                </li>
                
                <li>
                    <label>Username</label>
                    <div><input name="password" id="password" class="required" value="" type="text"></div>
                </li>
                
                <li>
                    <label>Password</label>
                    <div><input name="password" id="password" class="required" value="" type="text"></div>
                </li>
                
                <li>
                    <label>First Name</label>
                    <div><input name="firstname" id="firstname" class="required" value="" type="text"></div>
                </li>
                
                <li>
                    <label>Last Name</label>
                    <div><input name="lastname" id="lastname" class="required" value="" type="text"></div>
                </li>
                
                <li>
                    <label>Last Name</label>
                    <div><input name="lastname" id="lastname" class="required" value="" type="text"></div>
                </li>
                        
                <li>
                    <input value="Submit" class="button" type="button"> <input value="Reset" class="button" type="button">
                </li>
            </ul>
            </form>
            </div>
            
            <div class="box">

            <h3>Table Sample</h3>
            <table>
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Username</th>
                <th scope="col">Status</th>

                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class="odd">
                <td>2009-01-20</td>
                <td>admin</td>

                <td><span class="active">Active</span></td>
                <td><a href="#">Edit</a> | <a href="#">Remove</a></td>
            </tr>
            <tr>
                <td>2009-01-15</td>
                <td>ne-design</td>

                <td><span class="pending">Pending</span></td>
                <td><a href="#">Edit</a> | <a href="#">Remove</a></td>
            </tr>
            <tr class="odd">
                <td>2009-01-10</td>
                <td>blackdragon</td>

                <td><span class="closed">Closed</span></td>
                <td><a href="#">Edit</a> | <a href="#">Remove</a></td>
            </tr>
            <tr>
                <td>2009-01-05</td>
                <td>otaku</td>

                <td><span class="active">Active</span></td>
                <td><a href="#">Edit</a> | <a href="#">Remove</a></td>
            </tr>
            </tbody>
            </table>
            
            <div class="pagination">

                <ul>       
                    <li class="pages">Page:</li>
                    <li>1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>

                    <li>...</li>
                    <li><a href="#">10</a></li>
                </ul>
            </div>

        </div>
