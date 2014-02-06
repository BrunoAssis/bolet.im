class Course < ActiveRecord::Base
	belongs_to :school

  def to_s
    "#{self.school.name} - #{self.name}"
  end
end
