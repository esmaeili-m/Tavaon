        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        متن درباره ما</h2>
                </div>
                <div class="body">
                    <form class="form-horizontal" wire:submit.prevent="save">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line" wire:ignore>
                                        <textarea class="form-control" wire:model.defer="description" name="content"
                                                  rows="10"></textarea>

                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger mt-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <input type="checkbox" id="remember_me_4" class="filled-in">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت اطلاعات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
