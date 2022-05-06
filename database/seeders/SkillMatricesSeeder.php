<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillMatricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        DB::table('skill_matrices')->insert([
            [
                "Category" => "Technical Skills",
                "Skill" => "Security to Business Integration",
                "Level" => "0,1,2,0,4",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Risk management knowledge",
                "Level" => "0,1,2,0,4",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Regulation and compliance knowledge",
                "Level" => "0,1,2,2,4",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Reverse engineering",
                "Level" => "0,1,3,0,1",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Malware Analysis",
                "Level" => "0,1,3,0,1",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Digital forensics",
                "Level" => "0,1,3,1,1",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Threat hunting",
                "Level" => "0,1,3,1,1",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "New log sources integration and custom parsing",
                "Level" => "1,1,1,3,1",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "SIEM Architecture and Capacity planning",
                "Level" => "1,1,1,3,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "SIEM  Administration",
                "Level" => "1,1,1,3,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "ITIL and service life cycle knowledge",
                "Level" => "1,1,2,1,4",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "OS admininstration and security",
                "Level" => "1,1,2,3,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "OS admininstration and security",
                "Level" => "1,1,2,3,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Threat intelligence",
                "Level" => "1,1,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Use Cases and Content Development",
                "Level" => "1,2,2,3,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Application security and threat vectors",
                "Level" => "1,2,3,1,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "SIEM / log analysis and correlation",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Vulnerability scanning and management",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Network  security monitoring",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Malware Analysis",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Intrusion techniques and detection",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Technical Skills",
                "Skill" => "Network and Endpoint security tools knowledge",
                "Level" => "1,2,3,2,2",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Management skills",
                "Level" => "0,1,2,0,4",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Presentation skills",
                "Level" => "1,1,3,1,4",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Strong written and verbal communication skills",
                "Level" => "2,2,3,2,4",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Documentation and reporting skills",
                "Level" => "2,3,3,2,3",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Details oriented and analytical thinking",
                "Level" => "2,3,3,2,4",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Ability to work in a team environment",
                "Level" => "2,3,4,3,4",
            ],
            [
                "Category" => "Soft Skills",
                "Skill" => "Ability to work on shifts (nights and/or weekends)",
                "Level" => "3,2,2,1,1",
            ],
            [
                "Category" => "Edu",
                "Skill" => "Bachelor's degree (Computer Science - Engineering Related Field)",
                "Level" => "Mandatory,Mandatory,Mandatory,Mandatory,Mandatory",
            ],
            [
                "Category" => "Edu",
                "Skill" => "Master's Degree ( Cyber Security, Business Administration)",
                "Level" => "Not a Priority,Not a Priority,Nice to Have,Not a Priority,Significant Value",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "Network+, CCNA",
                "Level" => "Mandatory,Mandatory,Mandatory,Mandatory,Mandatory",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "CCNA Cyber OPS /  CySA+ / GSEC",
                "Level" => "Mandatory,Not a Priority,Nice to Have,Nice to Have,Significant Value",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "CHFI/ GCIH/ GCIA",
                "Level" => "Nice to Have,Significant Value ,Mandatory,Not a Priority,Nice to Have",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "SIEM Admin Certification",
                "Level" => "Not a Priority,Nice to Have,Nice to Have,Mandatory,Nice to Have",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "GCFA  / GREM / GCTI",
                "Level" => "Not a Priority,Nice to Have,Significant Value ,Not a Priority,Nice to Have",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "CASP / CISSP / SSCP",
                "Level" => "Not a Priority,Nice to Have,Significant Value ,Not a Priority,Significant Value",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "CISM/ CGEIT/ CRISC/ CISA",
                "Level" => "Not a Priority,Not a Priority,Nice to Have,Not a Priority,Mandatory",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "SIEM Analyst Certification",
                "Level" => "Significant Value ,Mandatory,Mandatory,Nice to Have,Nice to Have",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "Secuirty+ / CEH / ECSA",
                "Level" => "Significant Value ,Mandatory,Mandatory,Significant Value ,Significant Value",
            ],
            [
                "Category" => "Certifications",
                "Skill" => "CCNA Cyber OPS /  CySA+ / GSEC",
                "Level" => "Significant Value ,Significant Value ,Mandatory,Nice to Have,Significant Value",
            ]]);
    }
}
