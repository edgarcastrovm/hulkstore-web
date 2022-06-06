<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Store extends BaseController {

    use ResponseTrait;

    public function __construct() {
        helper(['url', 'form']);
    }

    public function index() {

        return view('pages/home');
    }

    public function addItem() {
        $session = session();
        if ($this->request->getHeader('Content-type')->getValue() === 'application/json') {
            $att = json_decode($this->request->getBody(), true);
        } else {
            $att = $this->request->getPost();
        }

        if (!session()->has('cart')) {
            $session->set('cart', []);
        }
        $items = $session->get('cart');
        if (array_key_exists($att['proId'], $items)) {
            $items[$att['proId']]['itvUnidad'] += 1;
            $items[$att['proId']]['itvValorTotal'] += (double) $att['proValor'];
        } else {
            $items[$att['proId']] = [
                'proId' => $att['proId'],
                'proNombre' => $att['proNombre'],
                'proImage' => $att['proImage'],
                'itvUnidad' => 1,
                'itvValorUnidad' => (float) $att['proValor'],
                'itvValorTotal' => (float) $att['proValor'],
            ];
        }
        $session->set('cart', $items);
        return $this->respond(array_values($session->get('cart')));
    }

    public function getItems() {
        $session = session();
        if (!session()->has('cart')) {
            $session->set('cart', []);
        }
        return $this->respond(array_values($session->get('cart')));
    }

    public function setNumItems() {
        $session = session();
        if ($this->request->getHeader('Content-type')->getValue() === 'application/json') {
            $att = json_decode($this->request->getBody(), true);
        } else {
            $att = $this->request->getPost();
        }
        $items = $session->get('cart');
        if (($items[$att['product']['proId']]['itvUnidad'] > 1 && (int) $att['val'] < 0) || ($items[$att['product']['proId']]['itvUnidad'] >= 1 && (int) $att['val'] > 0)) {
            $unidad = (int) $items[$att['product']['proId']]['itvUnidad'];
            $unidad += (int) $att['val'];
            $vunidad = (float) $items[$att['product']['proId']]['itvValorUnidad'];
            $items[$att['product']['proId']]['itvUnidad'] = $unidad;
            $items[$att['product']['proId']]['itvValorTotal'] = $vunidad * $unidad;
        }
        $session->set('cart', $items);
        return $this->respond(array_values($session->get('cart')));
    }

    public function clearItems() {
        $session = session();
        $session->set('cart', []);
        return $this->respond($session->get('cart'));
    }

}
