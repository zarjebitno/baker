<div class="container">
    <div class="row flex-center">
        <div class="col-lg-4" style="padding-top:75px">
            <h2>Add an account</h2>
            <form action="models/users/add-user.php" method="POST">
                <input type="text" id="first-name" name="first-name" placeholder="First name" required class="form-control"/>
                <input type="text" id="last-name" name="last-name" placeholder="Last name" required class="form-control"/>
                <input type="text" id="username-reg" name="username" placeholder="Username" required class="form-control"/>
                <input type="password" id="password-reg" name="password" placeholder="Password" required class="form-control"/>
                <input type="email" id="email" name="email" placeholder="Email" required class="form-control"/>
                <button type="submit" class="form-control" name="add-user">Add</button>
            </form>
        </div>
    </div>
</div>