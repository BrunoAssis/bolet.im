class Classroom < ActiveRecord::Base
  belongs_to :course
	belongs_to :period

  has_and_belongs_to_many :students, :join_table => :classrooms_students

  def to_s
    "#{self.name}"
  end
end