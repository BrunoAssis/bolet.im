json.array!(@classrooms) do |classroom|
  json.extract! classroom, :school_id, :course_id, :year_id, :period_id, :name
  json.url classroom_url(classroom, format: :json)
end
