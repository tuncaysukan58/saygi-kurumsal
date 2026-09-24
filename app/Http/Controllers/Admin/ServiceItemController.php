<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    public function store(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request);
        $data['service_id'] = $service->id;

        ServiceItem::create($data);

        return back()->with('status', 'Alt hizmet eklendi.');
    }

    public function update(Request $request, ServiceItem $serviceItem): RedirectResponse
    {
        $serviceItem->update($this->validated($request));

        return back()->with('status', 'Alt hizmet güncellendi.');
    }

    public function destroy(ServiceItem $serviceItem): RedirectResponse
    {
        $serviceItem->delete();

        return back()->with('status', 'Alt hizmet silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
        ]);
    }
}
