class Subject < ActiveRecord::Base
	belongs_to :school

  def to_s
    "#{self.name}"
  end
end
