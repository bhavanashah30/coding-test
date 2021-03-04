<!DOCTYPE html>
<html>
    <head>
       <title>New Visitor Information</title>
    </head>
    <body>
        <p>
            Hello!<br/>
            <br/>
            You have an interested visitor, a potential customer. Find their information below - <br/>
            <br/>
            <strong>Name:</strong> {{$interestedVisitor->name}} <br/>
            <strong>Email Address:</strong> {{$interestedVisitor->email}} <br/>
            <strong>Address:</strong> {{$interestedVisitor->address}} <br/>
            <strong>Phone Number:</strong> {{$interestedVisitor->phone_number}} <br/>
            <strong>Budget:</strong> {{$interestedVisitor->budget}}<br/>
            <br/>
            Thank You!
        </p>
    </body>
</html>
