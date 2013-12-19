json.array!(@grades) do |grade|
  json.extract! grade, :school_id, :student_id, :teacher_class_id, :grade
  json.url grade_url(grade, format: :json)
end
