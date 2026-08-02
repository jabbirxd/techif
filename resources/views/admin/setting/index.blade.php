@extends('layouts.admin')

@section('title', 'Site Setting')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0 text-white">Site Settings</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/settings') }}" method="POST">
                    @csrf

                    <!-- Section: Website Settings -->
                    <div class="card mb-4 shadow-sm border">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">Website Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Website Name</label>
                                    <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control" placeholder="e.g., Techif Store" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Website URL</label>
                                    <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control" placeholder="e.g., http://127.0.0.1:8000" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Page Title</label>
                                    <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control" placeholder="e.g., Techif Store - Best E-Commerce Platform" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Keywords separated by commas">{{ $setting->meta_keyword ?? '' }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Brief description of your site for SEO">{{ $setting->meta_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Website Contact Details -->
                    <div class="card mb-4 shadow-sm border">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">Website Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Address</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="e.g., Boro Boyra, Khalishpur, Khulna 9000">{{ $setting->address ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Phone No. 1</label>
                                    <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control" placeholder="e.g., +8801410295500" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Phone No. 2</label>
                                    <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email Id 1</label>
                                    <input type="email" name="email1" value="{{ $setting->email1 ?? '' }}" class="form-control" placeholder="e.g., info@techifstore.com" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email Id 2</label>
                                    <input type="email" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Social Media Links -->
                    <div class="card mb-4 shadow-sm border">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">Social Media Links</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Facebook</label>
                                    <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control" placeholder="Facebook Profile or Page URL" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Twitter</label>
                                    <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control" placeholder="Twitter Profile URL" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Instagram</label>
                                    <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control" placeholder="Instagram Profile URL" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">YouTube</label>
                                    <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control" placeholder="YouTube Channel URL" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-primary btn-lg text-white">Save Settings</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
