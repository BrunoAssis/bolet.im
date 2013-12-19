json.array!(@teacher_classes) do |teacher_class|
  json.extract! teacher_class, :school_id, :teacher_id, :subject_id, :classroom_id, :weekday, :start_time, :end_time
  json.url teacher_class_url(teacher_class, format: :json)
end
