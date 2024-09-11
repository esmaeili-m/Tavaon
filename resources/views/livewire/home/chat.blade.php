<div>
    <section id="content-2" class="content-2 wide-60 content-section division">
        <div class="container">
            <div style="margin-top: 40px" class="row d-flex align-items-center">
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">ارتباط با ادمین</div>
                                    <div class="card-body" id="chat-box" style="height: 400px; overflow-y: scroll;">
                                        @foreach($messages ?? [] as $message)

                                            <div class="mb-3 d-flex {{ $message->is_admin ? 'justify-content-end' : 'justify-content-start' }}">
                                                <div class="p-3 {{ $message->is_admin ? 'bg-light' : 'bg-primary-custom text-white' }} w-50 rounded shadow-sm" style="max-width: 75%;">
                                                    {{ $message->message }}
                                                    <div class="d-flex">
                                                        <div class=" small {{ $message->is_admin ? 'text-muted text-dark' : 'text-white' }} text-right mt-1">
                                                            {{ $message->created_at->format('h:i') }}
                                                        </div>
                                                        @if(!$message->is_admin && $loop->last)
                                                            <div class="d-flex" style="margin-right: auto">
                                                                <a style="cursor: pointer" class="mx-2 text-white" wire:click="update_last_message()" >ویرایش</a>
                                                                <a style="cursor: pointer" wire:click="delete_message()" >حذف</a>
                                                            </div>

                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="لطفا پیام خود را بنویسید..." wire:model="newMessage" wire:keydown.enter="sendMessage">
                                            <div class="input-group-append">
                                                <a wire:click="sendMessage" class="btn btn-sm mx-2 btn-pink tra-white-hover last-link">ارسال </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>

