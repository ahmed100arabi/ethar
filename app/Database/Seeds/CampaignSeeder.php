<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'حملة التوعية بمرض السكري',
                'description' => "ندعوكم لحضور يوم توعوي شامل حول مرض السكري، طرق الوقاية منه، وكيفية التعايش معه.\n\nمحاور الحملة:\n- فحص سكر مجاني\n- استشارات طبية\n- نظام غذائي صحي\n- توزيع أجهزة قياس للمحتاجين",
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=800',
                'event_date' => date('Y-m-d H:i:s', strtotime('+1 week')),
                'location' => 'طرابلس - ميدان الشهداء',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'معاً ضد سرطان الثدي',
                'description' => "أكتوبر الوردي.. شهر التوعية بسرطان الثدي. انضمي إلينا في ندوة تثقيفية حول أهمية الكشف المبكر.\n\nيتضمن الحدث:\n- قصص ملهمة لمحاربات السرطان\n- شرح طريقة الفحص الذاتي\n- حجز مواعيد للكشف المجاني",
                'image' => 'https://images.unsplash.com/photo-1579165466741-7f35e4755652?auto=format&fit=crop&q=80&w=800',
                'event_date' => date('Y-m-d H:i:s', strtotime('+2 weeks')),
                'location' => 'بنغازي - مركز بنغازي الطبي',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'صحة القلب.. حياتك',
                'description' => "أمراض القلب هي السبب الأول للوفيات. تعال وتعرف كيف تحمي قلبك.\n\nفعاليات:\n- قياس ضغط الدم\n- نصائح رياضية\n- ورشة عمل حول الإسعافات الأولية للذبحة الصدرية",
                'image' => 'https://images.unsplash.com/photo-1628348068343-c6a848d2b6dd?auto=format&fit=crop&q=80&w=800',
                'event_date' => date('Y-m-d H:i:s', strtotime('+3 weeks')),
                'location' => 'مصراتة - قاعة الشعب',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Using Query Builder
        $this->db->table('campaigns')->insertBatch($data);
    }
}
