<div class="mt-5">
    <h2 class="text-center mb-4">Menu List</h2>
    <ul>
        <li class="mb-2">
            <a href="{{ route('mypage') }}">マイページトップ</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('mypage.edit') }}">会員情報の編集</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('mypage.cart_history_index') }}">注文履歴</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('mypage.edit_password') }}">パスワード変更</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
