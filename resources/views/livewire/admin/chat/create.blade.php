<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class=" mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">ارتباط با {{$user->name}}</div>
                            <div class="card-body" id="chat-box" style="height: 400px; overflow-y: scroll;">
                                @foreach($messages ?? [] as $message)
                                    <div class="mb-3 d-flex {{ $message->is_admin ? 'justify-content-start' : 'justify-content-end' }}">
                                        <div class="p-3 {{ $message->is_admin ? 'bg-primary-custom  text-white' : 'bg-light' }} w-50 rounded shadow-sm" style="max-width: 75%;">
                                            {{ $message->message }}
                                            <div class=" small {{ $message->is_admin ? 'text-white' : 'text-muted text-dark' }} text-right mt-1">
                                                {{ verta($message->created_at->format('h:i')) }}
                                            </div>
                                            <div class="text-end">
                                                <i wire:click="update_last_message({{$message->id}})" style="margin-left: 3px; cursor: pointer" class="ml-2 fa fa-edit"></i>
                                                <i wire:click="delete_message({{$message->id}})" style="margin-left: 3px; cursor: pointer" class="ml-2 fa fa-times"></i>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="لطفا پیام خود را بنویسید..." wire:model="newMessage" wire:keydown.enter="sendMessage">
                                    <div class="input-group-append mt-2">
                                        <a wire:click="sendMessage" class="btn btn-primary btn-border-radius waves-effect m-lg-2">ارسال </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
