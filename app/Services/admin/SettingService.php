<?php

namespace App\Services\admin;
use App\Services\BaseService;
use App\Models\Setting as ObjModel;


class SettingService extends BaseService
{
    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view('admin.setting.index');
    }

    public function update($data)
    {

        unset($data['_token']);
        $setting = $this->model->first();
        if (isset($data['logo'])) {
            if ($setting &&file_exists($setting->logo)) {
                unlink($setting->logo);
            }
            $data['logo'] = $this->handleFile($data['logo'], 'uploads/settings');
        }

        if ($setting && isset($data['favicon'])) {
            if (file_exists($setting->favicon)) {
                unlink($setting->favicon);
            }
            $data['favicon'] = $this->handleFile($data['favicon'], 'uploads/settings');

        }

        foreach ($data as $key => $value) {

            $this->model->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            )
            ;
        }

        return response()->json(['status' => 200]);

    }
}
