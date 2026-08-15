<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>New Comment</title>
</head>

<body style="margin:0; padding:0; background:#f5f7fb; font-family:Arial, sans-serif;">

    <div style="max-width:650px; margin:40px auto; background:#ffffff; border-radius:18px; padding:35px; border:1px solid #e5e7eb;">

        <h2 style="margin-top:0; color:#1e3a5f;">
            New Comment Requires Approval
        </h2>

        <p style="color:#555;">
            A new comment has been submitted on the website and is currently waiting for approval.
        </p>

        <hr style="border:0; border-top:1px solid #eee; margin:25px 0;">

        <p>
            <strong>Name:</strong>
            {{ $comment->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $comment->email }}
        </p>

        <p>
            <strong>Rating:</strong>

            @for($i = 1; $i <= 5; $i++)
                @if($i <= $comment->rating)
                    ⭐
                @else
                    ☆
                @endif
            @endfor
        </p>

        <p>
            <strong>Message:</strong>
        </p>

        <div style="background:#f8fafc; border-radius:12px; padding:20px; color:#444; line-height:1.7;">
            {{ $comment->message }}
        </div>

        <div style="margin-top:30px; padding:15px; background:#fff7ed; border-radius:12px;">
            <strong>Status:</strong>
            <span style="color:#ea580c;">
                Pending Approval
            </span>
        </div>

        <p style="margin-top:30px; color:#666;">
            Please log in to the administration panel to review and approve this comment.
        </p>

    </div>

</body>
</html>