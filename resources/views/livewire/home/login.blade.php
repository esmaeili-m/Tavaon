<div>
    <div class="loginmain">
        <div class="loginCard">
            <div class="login-btn splits">
                <p>در حال حاضر یک کاربر؟</p>
                <button class="active">ورود</button>
            </div>
            <div class="rgstr-btn splits">
            </div>
            <div class="wrapper">
                <form wire:submit="login" id="login" tabindex="500">
                    <h3>ورود</h3>
                    <div class="mail">
                        <input wire:model.lazy="phone" type="text">
                        <label>شماره همراه</label>
                        @error('phone')
                        <p class="text-danger">این فیلد اجباری می باشد</p>
                        @enderror
                    </div>

                    <div class="passwd">
                        <input wire:model.lazy="password" type="password">
                        <label>رمزعبور</label>
                        @error('password')
                        <p class="text-danger">این فیلد اجباری می باشد</p>
                        @enderror
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-danger" style="border-radius: 5px">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <div class="submit">
                        <button class="dark">ورود</button>
                    </div>
                    <div class="flex-c p-b-112">
                        <a href="#" class="login100-social-item bg-fb">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="login100-social-item bg-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="login100-social-item bg-google">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
