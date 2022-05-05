@extends('front_layouts.layout')

@section('header')
    <!-- title -->

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" media="screen">

    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    
    <section class="u-align-center u-clearfix u-section-1" id="sec-8ad1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-tab-links-align-justify u-tabs u-tabs-1">
          <ul class="u-spacing-10 u-tab-list u-unstyled" role="tablist">
            <li class="u-tab-item" role="presentation">
              <a class="active u-active-custom-color-5 u-button-style u-custom-color-4 u-tab-link u-text-active-white u-text-black u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Transactions</a>
            </li>
          </ul>
          <div class="u-tab-content">
            
            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-14b7">
              <div class="u-container-layout u-container-layout-1">
                <div class="u-table u-table-responsive u-table-1">
                  <table class="u-table-entity u-table-entity-1">
                    <colgroup>
                      <col width="3%">
                      <col width="10%">
                      <col width="10%">
                      <col width="11%">
                      <col width="15%">
                    </colgroup>
                    <tbody class="u-table-alt-grey-5 u-table-body">
                      <tr style="height: 25px;">
                        <td class="u-align-center u-table-cell u-table-cell-1">S.N.</td>
                        <td class="u-align-center u-table-cell u-table-cell-4">Amount</td>
                        <td class="u-align-center u-table-cell u-table-cell-3">Type</td>
                        <td class="u-align-center u-table-cell u-table-cell-5">Created At</td>
                        <td class="u-align-center u-table-cell u-table-cell-6">Comment</td>
                      </tr>
                      
                      @foreach ($account->transactions as $transaction)
                      <tr style="height: 26px;">
                        <td class="u-align-center u-table-cell">{{ $loop->iteration }}</td>
                        <td class="u-align-center u-table-cell">{{ $transaction->amount }}</td>
                        <td class="u-align-center u-table-cell">{{ $transaction->type }}</td>
                        <td class="u-align-center u-table-cell">{{ $transaction->created_at }}</td>
                        <td class="u-align-center u-table-cell">{{ $transaction->amount }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel" aria-labelledby="link-tab-2917">
              <div class="u-container-layout u-container-layout-3">
                <h4 class="u-text u-text-default u-text-3">Be The First To Review This Product!</h4>
                <p class="u-text u-text-4">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                <a href="" class="u-btn u-button-style u-btn-1">write product review</a>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="link-tab-93fc" role="tabpanel" aria-labelledby="tab-93fc">
              <div class="u-container-layout u-container-layout-4"></div>
            </div>
          </div>
        </div>
        
        
        </a>
        
      </div>
    </section>  
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
