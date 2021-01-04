<?php

namespace App\Http\Controllers\PageSettings;

use App\Http\Controllers\Controller;
use App\Rules\Username;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InfoController extends Controller
{
    use UploadImage;

    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('page-settings/info/Index', [
            'title' => __('تنظیمات صفحه - اطلاعات اصلی'),
            'menu' => 'page-settings',
            'subMenu' => 'info'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validateWithBag('info', [
            'name' => 'required|max:255',
            'name_en' => 'max:255',
            'bio' => 'max:1000',
            'bio_en' => 'max:1000',
        ]);

        $request->user()->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'bio' => $request->bio,
            'bio_en' => $request->bio_en,
        ]);

        return back()->with([
            'success' => __('اطلاعات عمومی بروزرسانی شد')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkUsername(Request $request)
    {
        $this->validateUsername($request);

        return back()->with([
            'username' => __('تبریک! نام کاربری مورد نظر موجوده')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function username(Request $request)
    {
        $this->validateUsername($request);

        $request->user()->update([
            'username' => $request->username
        ]);

        return back()->with([
            'success' => __('نام کاربری تغییر داده شد')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function avatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|max:1024'
        ]);
        if ($validator->fails()) {
            return back()->with([
                'error' => $validator->errors()->first()
            ]);
        }

        try {
            if ($request->user()->avatar) {
                Storage::disk('public')->delete($request->user()->avatar);
            }

            $request->user()->update([
                'avatar' => $this->uploadImage($request, 'avatar', 'public')
            ]);

            return back()->with([
                'success' => __('تصویر پروفایتون عوض شد')
            ]);
        } catch (\Exception $e) {
            $this->rollbackUpload();
            throw $e;
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAvatar()
    {
        if (!auth()->user()->avatar) {
            return back()->with([
                'error' => __("تصویر پروفایلی واسه حذف نداری")
            ]);
        }

        Storage::disk('public')->delete(auth()->user()->avatar);

        auth()->user()->update([
            'avatar' => null
        ]);

        return back()->with([
            'success' => __('تصویر پروفایلت حذف شد')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateUsername(Request $request)
    {
        $request->validateWithBag('username', [
            'username' => [
                'required',
                'min:5',
                'max:50',
                'alpha_dash',
                Rule::unique('users', 'username')->where(function ($query) use ($request) {
                    return $query->where('id', '!=', $request->user()->id);
                }),
                new Username()
            ],
        ]);
    }
}
