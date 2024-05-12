<div class="header">
    <div class="logoTop">
        <img src="{{ url('img/main-logo.png') }}" alt="team-img" style="height:auto; width: 150px;" />
    </div>
    <div class="user-profile">
        @if($admin)
        <span>{{ $admin->name }}</span>
        @endif
    </div>
</div>

<style>
    .user-profile {
        text-align: center;
        margin: 10px;
        margin-top: -20px;
    }

    .logoTop {
        margin-top: -30xp;
        margin-left: 45px;
    }
</style>