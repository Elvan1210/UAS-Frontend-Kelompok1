<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|string',
        ]);

        $menu = Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
        ]);

        return response()->json([
            'message' => 'Menu berhasil ditambahkan',
            'data' => $menu,
        ]);
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return response()->json(['message' => 'Menu tidak ditemukan'], 404);
        }
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan');
        }

        $menu->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
        ]);

        return redirect()->route('menu.list')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan');
        }

        $menu->delete();
        return redirect()->route('menu.list')->with('success', 'Menu berhasil dihapus!');
    }

    public function input()
    {
        return view('menu.inputdata');
    }

    public function list()
    {
        $menus = Menu::all();
        return view('menu.datalist', compact('menus'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|string',
        ]);

        Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
        ]);

        return redirect()->route('menu.list')->with('success', 'Menu berhasil disimpan!');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('menu.list')->with('error', 'Menu tidak ditemukan');
        }
        return view('menu.editdata', compact('menu'));
    }

}
