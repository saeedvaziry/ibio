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
            'title' => __('Page settings - Info'),
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
            'name' => 'required|max:255'
        ]);

        $request->user()->update([
            'name' => $request->name,
            'bio' => $request->bio
        ]);

        return back()->with([
            'success' => __('Public info updated')
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
            'username' => __('This username is available')
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
            'success' => __('The username has been changed')
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
                'success' => __('The avatar has been changed')
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
                'error' => __("You don't have avatar to delete")
            ]);
        }

        Storage::disk('public')->delete(auth()->user()->avatar);

        auth()->user()->update([
            'avatar' => null
        ]);

        return back()->with([
            'success' => __('The avatar has been deleted')
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
