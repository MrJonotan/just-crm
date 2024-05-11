<?php

namespace App\Http\Controllers;

use App\Models\JobStatus;
use App\Http\Requests\StoreJobStatusRequest;
use App\Http\Requests\UpdateJobStatusRequest;

class JobStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobStatus  $jobStatus
     * @return \Illuminate\Http\Response
     */
    public function show(JobStatus $jobStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobStatus  $jobStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(JobStatus $jobStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobStatusRequest  $request
     * @param  \App\Models\JobStatus  $jobStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobStatusRequest $request, JobStatus $jobStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobStatus  $jobStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobStatus $jobStatus)
    {
        //
    }
}
